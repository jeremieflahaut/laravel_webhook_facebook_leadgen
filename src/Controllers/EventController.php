<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Facebook\Facebook;

class EventController extends Controller
{
    /**
     * handle event from Facebook
     *
     * @param Facebook $fb
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function handle(Facebook $fb, Request $request)
    {
        $changes = $request->input('entry.0.changes');

        foreach ($changes as $change)
        {
            $profil = [];
            try {
                $response = $fb->get('/' . $change['value']['leadgen_id']);
                $fields = $response->getGraphNode()->getField('field_data');

                foreach ($fields as $field)
                {
                    $profil[($field->getField('name'))] = $field->getField('values')->offsetGet(0);
                }

                var_dump($profil); //Retriving Lead 

            } catch (\Exception $e) {
                echo $e->getMessage();
                die;
            }
        }

        return response('success', 200);
    }
}