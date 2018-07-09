<?php

class InitPlugin extends Migration {
    
    public function up()
    {
        Config::get()->create(
            "COURSES_TO_QUICKACCESS_TYPES",
            array(
                'type' => "string",
                'range' => "global",
                'section' => "COURSES_TO_QUICKACCESS",
                'value' => "103",
                'description' => "Welche Veranstaltungstypen sollen im Schnellzugriff angezeigt werden?"
            )
        );
    }
	
	public function down()
    {
        Config::get()->delete("COURSES_TO_QUICKACCESS_TYPES");
    }
}