<?php

  class Post extends BaseModel {
    private $postsOnPage;

    public function __construct() {
      parent::__construct();
      $this->postsOnPage = 10;
    }

    public function validate($title, $body, $author) {
      $errors = [];

      if (strlen($title) < 5) {
        $errors[] = 'Title string is too short!';
      }

      if (empty($body)) {
        $errors[] = 'Body should not be empty!';
      }

      if ($author == 'admin') {
        $errors[] = 'Admin should not create posts!';
      }

      return $errors;
    }

    public function pageNumber() {
      $res = $this->conn->query('SELECT count(id) as count FROM posts');
      $totalNumber = $res->fetch(PDO::FETCH_ASSOC)['count'];

      return ceil($totalNumber / $this->postsOnPage);
    }

    public function getPosts($pageNumber) {
      $offsetValue = ($pageNumber - 1) * $this->postsOnPage;

      $stmt = $this->conn->prepare('SELECT p.id, p.title, p.body, u.username, COUNT(c.id) as
                          comments_count FROM posts as p JOIN users as u ON u.id = p.user_id LEFT JOIN comments as
                          c ON p.id = c.post_id GROUP BY p.id LIMIT :lim OFFSET :offs');

      $stmt->bindParam(':lim', $this->postsOnPage, PDO::PARAM_INT);
      $stmt->bindParam(':offs', $offsetValue, PDO::PARAM_INT);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPost($id) {
      $stmt = $this->conn->prepare('SELECT p.id, p.title, p.body, u.username FROM
                                    posts as p JOIN users as u ON u.id = p.user_id WHERE p.id = ?');
      $stmt->execute([$id]);

      return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addPost($title, $body, $author) {
      $stmt = $this->conn->prepare('INSERT INTO posts (title, body, author) VALUES (?, ?, ?)');
      $stmt->execute([$title, $body, $author]);

      return $this->conn->lastInsertId();
    }

    public function deletePost($id) {
      $stmt = $this->conn->prepare('DELETE FROM posts WHERE id = ?');
      $stmt->execute([$id]);
    }

    public function updatePost($id, $title, $body, $author) {
      $stmt = $this->conn->prepare('UPDATE posts SET title = ?, body = ?, author = ? WHERE id = ?');
      $stmt->execute([$title, $body, $author, $id]);
    }

    public function getTitles() {
      $res = $this->conn->query('SELECT title FROM posts');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEvenPosts() {
      $res = $this->conn->query('SELECT p.id, p.title, p.body, u.username FROM
                                 posts as p JOIN users as u ON u.id = p.user_id WHERE p.id % 2 = 0');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSortedPosts() {
      $res = $this->conn->query('SELECT p.id, p.title, p.body, u.username FROM
                                 posts as p JOIN users as u ON u.id = p.user_id ORDER BY id DESC');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPostsByTitle() {
      $res = $this->conn->query('SELECT p.id, p.title, p.body, u.username FROM
                                 posts as p JOIN users as u ON u.id = p.user_id ORDER BY title');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPostsByAuthor() {
      $res = $this->conn->query('SELECT p.id, p.title, p.body, u.username FROM
                                 posts as p JOIN users as u ON u.id = p.user_id ORDER BY user_id');
      return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCountOperationsByAuthor($author) {
      $stmt = $this->conn->prepare('SELECT COUNT(p.user_id) as count FROM posts as p
                                    INNER JOIN users as u ON u.id = p.user_id AND u.username = ?
                                    UNION ALL
                                    SELECT COUNT(c.user_id) as count FROM comments as c
                                    INNER JOIN users as u ON u.id = c.user_id AND u.username = ?');
      $stmt->execute([$author, $author]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStat() {
      $authors = $this->conn->query('SELECT u.username, COUNT(p.user_id) as posts_count FROM users as u
                                     JOIN posts as p ON u.id = p.user_id GROUP BY u.username');
      return $authors->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAvgStat() {
      $avg = $this->conn->query('SELECT AVG(a_count) as a_vg FROM (SELECT COUNT(user_id)
                                 as a_count FROM posts GROUP BY user_id) X');
      return $avg->fetchAll(PDO::FETCH_ASSOC);
    }
  }
