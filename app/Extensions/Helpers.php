<?php

namespace App\Extensions;

class Helpers
{

 	public static function saveImage($file, $route, $id = null)
 	{
 		if ($file) {
            if ($file->isValid()) {
		        $path = public_path('img/'.$route.'/');
		        $route_file = $file->getClientOriginalName();
				// $route_file = $route.'_'.$id."_".$file->getClientOriginalName();
				$route_file = gmdate('s').$file->getClientOriginalName();
		        $file->move($path, $route_file);

		        return $route_file;
            }
        }
        return false;
    }

}
