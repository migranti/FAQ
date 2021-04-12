<?php

namespace Models;

use Core\Helpers;
use Core\DB;

class FaqModel extends Model
{

    public function getFAQ()
    {
        $rows = [];

        $baza = new Db();

        $sql = "SELECT * FROM faq WHERE ";

        if (!empty($_GET['keyword'])) {
            $plus = strpos($_GET['keyword'], '+');

            if ($plus === false) {
                $keywords = explode(" ", $_GET["keyword"]);

                foreach ($keywords as $key => $keyword) {
                    $baza->bind("title" . $key, "%$keyword%");
                    $baza->bind("description" . $key, "%$keyword%");

                    $sql .= "title LIKE :title$key" . ' OR ';
                    $sql .= "description LIKE :description$key" . ' OR ';
                }
            } else {
                $Pkeywords = explode("+", $_GET["keyword"]);

                foreach ($Pkeywords as $key => $Pkeyword) {
                    $baza->bind("description" . $key, "%$Pkeyword%");

                    $sql .= "description LIKE :description$key" . ' and ';
                }
            }

            $sql = substr($sql, 0, -4);

            $rows = $baza->query($sql);
        } else {
            $rows = $baza->query('SELECT * FROM FAQ');
        }
        $data['faq'] = $rows;

        $this->db = null;

        return $data;
    }


    protected function sanitizeForm($data)
    {
        foreach ($data as $key => $val) {
            $key = HELPERS::clean($key);
            $val = is_array($val) ? $this->sanitizeForm($val) : HELPERS::clean($val);
            $data[$key] = $val;
        }

        return $data;
    }
}
