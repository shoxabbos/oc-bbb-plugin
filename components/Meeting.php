<?php namespace Shohabbos\Bigbluebutton\Components;

use Auth;
use Flash;
use Input;
use Cms\Classes\ComponentBase;
use Shohabbos\Bigbluebutton\Models\Meeting as MeetingModel;
use Shohabbos\Bigbluebutton\Classes\BbbApi;

class Meeting extends ComponentBase
{

    private $api;
    private $user;

    public function componentDetails()
    {
        return [
            'name'        => 'Meeting Helper',
            'description' => 'Allows to work with the BBB API'
        ];
    }

    public function init() {
        $this->user = Auth::getUser();
        $this->api = new BbbApi();
    }


    public function onCreate() {
        try {
            $time = time();
            $data = Input::only('name');
            $data['meetingID'] = "user-{$this->user->id}-{$time}";
            
            $result = $this->api->call('create', $data);

            $meeting = new MeetingModel([
                'meetingid' => $result['meetingID'],
                'attendeepw' => $result['attendeePW'],
                'moderatorpw' => $result['moderatorPW'],
                'dialnumber' => $result['dialNumber'],
                'voicebridge' => $result['voiceBridge'],
                'duration' => $result['duration'],
                'user_id' => $this->user->id,
            ]);
            $meeting->save();

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }


    public function onJoin() {
        try {
            $data = Input::only('fullName', 'meetingID', 'password', 'redirect');
            
            $result = $this->api->call('join', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }

    public function onIsMeetingRunning() {
        try {
            $data = Input::only('meetingID');
            
            $result = $this->api->call('isMeetingRunning', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }
    

    public function onGetMeetingInfo() {
        try {
            $data = Input::only('meetingID', 'password');
            
            $result = $this->api->call('getMeetingInfo', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }

    public function onEnd() {
        try {
            $data = Input::only('meetingID', 'password');
            
            $result = $this->api->call('end', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }

    public function onGetMeetings() {
        try {
            $data = [];
            
            $result = $this->api->call('getMeetings', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }


    public function onGetDefaultConfigXML() {
        try {
            $data = [];
            
            $result = $this->api->call('getDefaultConfigXML', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }


    public function onGetRecordings() {
        try {
            $data = Input::only('meetingID', 'recordID');
            
            $result = $this->api->call('getRecordings', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }

    public function onPublishRecordings() {
        try {
            $data = Input::only('publish', 'recordID');
            
            $result = $this->api->call('publishRecordings', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }

    public function onDeleteRecordings() {
        try {
            $data = Input::only('recordID');
            
            $result = $this->api->call('deleteRecordings', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }

    public function onUpdateRecordings() {
        try {
            $data = Input::only('recordID');
            
            $result = $this->api->call('updateRecordings', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }

    public function onGetRecordingTextTracks() {
        try {
            $data = Input::only('recordID');
            
            $result = $this->api->call('getRecordingTextTracks', $data);

            dump($result);
            exit;

        } catch (\Exception $e) {
            Flash::error($e->getMessage());
        }
    }


}
