<?php

namespace App\Models;
use PDO;

class Movie extends DatabaseModel
{
    
    protected static $columns = ['id', 'title', 'year', 'description'];

    protected static $tableName = "movies";

 	protected static $validationRules = [
        'title'       => 'minlength:1',
        'year'        => 'minlength:4,maxlength:4,numeric',
        'description' => 'minlength:10'
    ];

    public function comments()
    {
        return Comment::allBy('movieID', $this->id);
    }

    public function getTags()
    {
        $models = [];

        $db = static::getDatabaseConnection();

        $query  = "SELECT id, tag FROM tags ";
        $query .= " JOIN movies_tags ON id = tag_id ";
        $query .= " WHERE movie_id = :id";

        $statement = $db->prepare($query);
        $statement->bindValue(":id", $this->id);
        $statement->execute();

        while ($record = $statement->fetch(PDO::FETCH_ASSOC)) {
            $model = new Tag();
            $model->data = $record;
            array_push($models, $model);
        }

        return $models;

    }

       public function loadTags()
    {
        $tags = $this->getTags();
        $taglist = [];
        foreach ($tags as $tag) {
            array_push($taglist, $tag->tag);
        }
        $this->tags = implode($taglist, ", ");
    }

     public function saveTags()
    {
        // take the string from the tags property
        // explode it into an array
        $tags = explode(",",$this->tags);
        foreach ($tags as &$tag) {
            $tag = strtolower(trim($tag));
        }

        $db = static::getDatabaseConnection();

        $db->beginTransaction();

        try {

            $this->addNewTags($db, $tags);
            $tagIds = $this->getTagIds($db, $tags);
            $this->deleteAllTagsFromMovie($db);
            $this->insertTagsForMovie($db, $tagIds);

            $db->commit();

        } catch (Exception $e) {
            $db->rollBack();
            throw $e;
        }

    }

    private function addNewTags($db, $tags)
    {
        // insert each tag into the tags table (ignore dupes)
        $query = "INSERT IGNORE INTO tags (tag) VALUES ";

        $tagvalues = [];
        for ($i = 0; $i < count($tags); $i += 1) {
            array_push($tagvalues, "(:tag{$i})");
        }
        $query .= implode(",", $tagvalues);

        $statement = $db->prepare($query);
        for ($i = 0; $i < count($tags); $i += 1) {
            $statement->bindValue(":tag{$i}", $tags[$i]);
        }

        $statement->execute();
    }

    private function getTagIds($db, $tags)
    {

        // get the ids for each tag
        $query = "SELECT id FROM tags WHERE ";
        $tagvalues = [];
        for ($i = 0; $i < count($tags); $i += 1) {
            array_push($tagvalues, " tag = :tag{$i}");
        }
        $query .= implode(" OR ", $tagvalues);

        $statement = $db->prepare($query);
        for ($i = 0; $i < count($tags); $i += 1) {
            $statement->bindValue(":tag{$i}", $tags[$i]);
        }

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_COLUMN);
    }

    private function deleteAllTagsFromMovie($db)
    {
        // delete all existing relationships between this movie and all tags

        $query = "DELETE FROM movies_tags WHERE movie_id = :movie_id";
        $statement = $db->prepare($query);
        $statement->bindValue(':movie_id', $this->id);
        $statement->execute();
    }

    private function insertTagsForMovie($db, $tagIds)
    {
        // insert all relationships

        $query = "INSERT IGNORE INTO movies_tags (movie_id, tag_id) VALUES ";

        $tagvalues = [];
        for ($i = 0; $i < count($tagIds); $i += 1) {
            array_push($tagvalues, "(:movie_id_{$i}, :tag_id_{$i})");
        }
        $query .= implode(",", $tagvalues);

        $statement = $db->prepare($query);
        for ($i = 0; $i < count($tagIds); $i += 1) {
            $statement->bindValue(":movie_id_{$i}", $this->id);
            $statement->bindValue(":tag_id_{$i}", $tagIds[$i]);
        }

        $statement->execute();
    }

}