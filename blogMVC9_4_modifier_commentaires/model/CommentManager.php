<?php

namespace OpenClassrooms\Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    // Ici je pige pas, j'ai tjrs une parse error avec la première accolade...

    /*public function getComment($postId)
    {
        $db = $this->dbConnect();
        $newComment = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ?');
        $editedLines = $newComment->execute(array($postId)); 
 
        return $editedLines;
    }*/

    public function updateComment($postId, $comment)
    {
         $db = $this->dbConnect();
         $comments = $db->prepare('UPDATE comments SET comment = ? WHERE id = ?');
        $editedComment = $comments->execute(array($postId, $comment)); //ligne 31
 
        return $editedComment;
    }    
}