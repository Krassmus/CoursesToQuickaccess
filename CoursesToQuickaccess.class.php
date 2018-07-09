<?php

class CoursesToQuickaccess extends StudIPPlugin implements SystemPlugin
{
    public function __construct()
    {
        parent::__construct();
        $types = Config::get()->COURSES_TO_QUICKACCESS_TYPES;
        $types = preg_split("/\s*,\s*/", $types);
        $main = false;
        foreach ($types as $type) {
            $type = trim($type);
            $courses = Course::findBySQL("status = ? ORDER BY name ASC", array($type));
            foreach ($courses as $course) {
                if (!$main) {
                    $nav = new Navigation(_("Ansprechpersonen"));
                    $nav->setURL(URLHelper::getURL("dispatch.php/course/scm", array('cid' => $course->getId())));
                    Navigation::insertItem("/start/ansprechpersonen", $nav, "my_courses");
                    $main = true;
                }
                $nav = new Navigation($course['name']);
                $nav->setURL(URLHelper::getURL("dispatch.php/course/scm", array('cid' => $course->getId())));
                Navigation::addItem("/start/ansprechpersonen/sem_".$course->getId(), $nav);
            }
        }
    }
}