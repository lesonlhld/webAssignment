<?php

namespace Model;

/**
 * NEWS_Model
 * @author    Le Trung Son    lesonlhld@gmail.com
 */
class NEWS_Model extends \Model\Model
{
    public function get_list_active($start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM news WHERE publish=1');
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT * FROM news WHERE publish=1 LIMIT :start');
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT * FROM news WHERE publish=1 LIMIT :start,:limit');
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count_active()
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM news WHERE publish=1');
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function get_list($start = null, $limit = null)
    {
        if ($start == null && $limit == null) {
            $stmt = $this->pdo->prepare('SELECT news.*, users.email FROM news LEFT JOIN users ON news.create_by=users.id');
            $stmt->execute();

            return $stmt->fetchAll();
        } elseif ($limit == null) {
            $stmt = $this->pdo->prepare('SELECT news.*, users.email FROM news LEFT JOIN  users ON news.create_by=users.id LIMIT :start');
            $stmt->bindParam(':start', $start);
            $stmt->execute();

            return $stmt->fetch();
        } else {
            $stmt = $this->pdo->prepare('SELECT news.*, users.email FROM news LEFT JOIN users ON news.create_by=users.id LIMIT :start,:limit');
            $stmt->bindParam(':start', $start);
            $stmt->bindParam(':limit', $limit);
            $stmt->execute();

            return $stmt->fetchAll();
        }
    }

    public function count()
    {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) FROM news');
        $stmt->execute();

        return $stmt->fetchColumn();
    }

    public function get($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM news WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function get_by_slug($slug)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM news WHERE slug=:slug');
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create($data)
    {
        $slug = linkseo($data['title']);
        $create_by = $_SESSION['id'];
        $publish = $data['publish'] ?? "0";

        $stmt = $this->pdo->prepare('INSERT INTO news(title, slug, image, short_content, content, create_by, publish) VALUES (:title, :slug, :image, :short_content, :content, :create_by, :publish)');
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':short_content', $data['short_content']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':create_by', $create_by);
        $stmt->bindParam(':publish', $publish);
        $stmt->execute();

        return $this->pdo->lastInsertId();
    }

    public function update($id, $data)
    {
        $slug = linkseo($data['title']);
        $publish = $data['publish'] ?? "0";

        $stmt = $this->pdo->prepare('UPDATE news SET title=:title, slug=:slug, image=:image, short_content=:short_content, content= :content, publish=:publish WHERE id=:id');
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':slug', $slug);
        $stmt->bindParam(':image', $data['image']);
        $stmt->bindParam(':short_content', $data['short_content']);
        $stmt->bindParam(':content', $data['content']);
        $stmt->bindParam(':publish', $publish);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return true;
    }

    public function update_published($id)
    {
        $stmt = $this->pdo->prepare('SELECT publish FROM news WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $publish = $stmt->fetchColumn();
        $publish = ($publish + 1) % 2;

        $stmt = $this->pdo->prepare('UPDATE news SET publish=:publish WHERE id =:id');
        $stmt->bindParam(':publish', $publish);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $publish;
    }
}
