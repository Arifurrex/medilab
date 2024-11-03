<?php  

namespace App\Helpers;
use App\Models\User;
use App\Helpers\GravatarHelpers;
/**
 * 
 */
class ImageHelper
{
	public static function getUserImage($id)
	{
		$user=User::find($id);
		$avatar_url="";
		if(!is_null($user)){

			if($user->avatar == NULL){ 
				// then return gravatar image 
				if(GravatarHelpers::validate_gravatar($user->email)){
					$avatar_url=GravatarHelpers::gravatar_image($user->email,100);
				}else{
					// when there is no gravatar image
					$avatar_url=url('images/defaults/user.png');
				}

			}else{
					// return that image
					$avatar_url=url('images/users/'.$user->avatar);
				}

			}else{
					// return redirect(/)
				}
				return $avatar_url;
			}
		
	
	
}