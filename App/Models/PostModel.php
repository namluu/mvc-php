<?php
namespace App\Models;

class PostModel extends \Core\Model
{
    public static function getAll()
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $results;
    }
}
