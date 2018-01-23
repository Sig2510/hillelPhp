<?php
  class Comment extends BaseModel {
    public function __construct() {
      parent::__construct();
    }

    public function getCommentByPostId($id) {
      $stmt = $this->conn->prepare("SELECT c.author, c.body, c.id FROM comments as c
                                    WHERE c.post_id = ?");
      $stmt->execute([$id]);

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFiveLastComments() {
      $res = $this->conn->query('SELECT * FROM comments ORDER BY id DESC LIMIT 5');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCommentsByParentRealese() {
      $res = $this->conn->query('SELECT * FROM comments ORDER BY post_id DESC LIMIT 5');
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
  }
