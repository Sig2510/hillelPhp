<?php
  class Comment extends BaseModel {
    public function __construct() {
      parent::__construct();
    }

    public function getCommentByPostId($id) {
      $stmt = $this->conn->prepare("SELECT u.username, c.body, c.id  FROM comments as c
                                    INNER JOIN users as u ON u.id = c.user_id AND c.post_id = ? ORDER BY c.id DESC");
      $stmt->execute([$id]);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFiveLastComments() {
      $res = $this->conn->query('SELECT u.username, c.body, c.id  FROM comments as c
                                 INNER JOIN users as u ON u.id = c.user_id ORDER BY c.id DESC LIMIT 5');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommentsByParentRealese() {
      $res = $this->conn->query('SELECT  u.username, c.body, c.id  FROM comments as c
                                 INNER JOIN users as u ON u.id = c.user_id ORDER BY post_id DESC');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateComment($id, $body, $author) {
      $stmt = $this->conn->prepare('UPDATE comments SET body = ?, author = ? WHERE id = ?');
      $stmt->execute([$body, $author, $id]);
    }

    public function getCommentById($id) {
      $stmt = $this->conn->prepare("SELECT c.author, c.body, c.id, c.post_id FROM comments as c
                                    WHERE c.id = ?");
      $stmt->execute([$id]);

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllComments() {
      $res = $this->conn->query('SELECT c.body, c.post_id FROM comments as c ORDER BY c.id DESC');

      return $res->fetchAll(PDO::FETCH_ASSOC);
    }
  }
