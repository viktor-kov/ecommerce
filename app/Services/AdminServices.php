<?php 

namespace App\Services;

use App\Models\UserAction;

class AdminServices {

    //show the actions with the page
    function showUserActions() {
        //for all days in past week we will count the trafic records from db and pass it to actions arras
        //now() functions is the todays date and the subDays() is incrementing every round by 1, so we can grab the interactions from every day
        for($i = 0; $i <= 6; $i++) {
            $actions_per_day = UserAction::whereDay('created_at', today()->subDays($i))->count();
            $actions[] = $actions_per_day;
            
            $days = ucfirst(today()->subDays($i)->isoFormat('dddd'));
            $all_days[] = $days;
        }

        //encode to json the actions array
        $user_actions['user_actions'] = json_encode($actions, JSON_NUMERIC_CHECK);

        //encode to json the days array
        $user_actions['action_days'] = json_encode($all_days);

        return $user_actions;
    }
}