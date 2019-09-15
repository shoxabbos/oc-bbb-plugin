<?php namespace Shohabbos\Bigbluebutton\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateShohabbosBigbluebuttonMeetings extends Migration
{
    public function up()
    {
        Schema::create('shohabbos_bigbluebutton_meetings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('meetingid')->nullable();
            $table->string('attendeepw')->nullable();
            $table->string('moderatorpw')->nullable();
            $table->string('welcome')->nullable();
            $table->string('dialnumber')->nullable();
            $table->string('voicebridge')->nullable();
            $table->string('webvoice')->nullable();
            $table->integer('maxparticipants')->nullable();
            $table->string('logouturl')->nullable();
            $table->boolean('record')->nullable();
            $table->integer('duration')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('user_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('shohabbos_bigbluebutton_meetings');
    }
}
