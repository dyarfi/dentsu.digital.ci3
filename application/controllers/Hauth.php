<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HAuth extends Public_Controller {

    public function __construct () {
        parent::__construct();
        
        
    }
    
	public function index(){ $this->load->view('hauth/home'); }
    
    public function done(){ $this->load->view('hauth/done'); }

	public function login($provider)
	{
		log_message('debug', "controllers.HAuth.login($provider) called");

		try
		{
			log_message('debug', 'controllers.HAuth.login: loading HybridAuthLib');
			$this->load->library('HybridAuthLib');

			if ($this->hybridauthlib->providerEnabled($provider))
			{
				log_message('debug', "controllers.HAuth.login: service $provider enabled, trying to authenticate.");
				$service = $this->hybridauthlib->authenticate($provider);
                
                if ($service->isUserConnected())
				{
					log_message('debug', 'controller.HAuth.login: user authenticated.');

					$user_profile = $service->getUserProfile();

					log_message('info', 'controllers.HAuth.login: user profile:'.PHP_EOL.print_r($user_profile, TRUE));

					$data['user_profile'] = $user_profile;
                    
                    if ($user_profile) {
                            
                            $participant = $this->Participants->getParticipantByIdentity($user_profile->identifier,$provider);
                            
                            if (!$participant) {
                                
                                $object['identifier_id'] = $user_profile->identifier;
                                $object['identity'] = $provider;
                                $object['profile_url'] = $user_profile->profileURL;
                                $object['name'] = $user_profile->displayName;
                                $object['gender'] = $user_profile->gender;
                                $object['age'] = $user_profile->age;
                                $object['email'] = $user_profile->email;
                                $object['address'] = $user_profile->address;
                                $object['region'] = $user_profile->region;
                                $object['phone_number'] = $user_profile->phone;
                                $object['website'] = $user_profile->webSiteURL;
                                $object['about'] = $user_profile->description;
                                $object['photo_url'] = $user_profile->photoURL;
                                $object['status'] = 0;                                
                                
                                $participant_id = $this->Participants->setParticipant($object);
                                
                                echo $participant_id; 
                                
                            } else {
                                
                                $this->session->set_userdata('participant',$participant);
                                
                                //redirect(base_url('account'));
                                
                            }
                            
                            /****
                             * FACEBOOK
                             */
                            /*
                            object(Hybrid_User_Profile)#29 (22) {
                            ["identifier"]=>
                            string(16) "1588544004757909"
                            ["webSiteURL"]=>
                            string(0) ""
                            ["profileURL"]=>
                            string(61) "https://www.facebook.com/app_scoped_user_id/1588544004757909/"
                            ["photoURL"]=>
                            string(72) "https://graph.facebook.com/1588544004757909/picture?width=150&height=150"
                            ["displayName"]=>
                            string(13) "Nairfed Ifray"
                            ["description"]=>
                            string(0) ""
                            ["firstName"]=>
                            string(7) "Nairfed"
                            ["lastName"]=>
                            string(5) "Ifray"
                            ["gender"]=>
                            string(4) "male"
                            ["language"]=>
                            NULL
                            ["age"]=>
                            NULL
                            ["birthDay"]=>
                            NULL
                            ["birthMonth"]=>
                            NULL
                            ["birthYear"]=>
                            NULL
                            ["email"]=>
                            string(18) "dyarfi20@gmail.com"
                            ["emailVerified"]=>
                            string(18) "dyarfi20@gmail.com"
                            ["phone"]=>
                            NULL
                            ["address"]=>
                            NULL
                            ["country"]=>
                            NULL
                            ["region"]=>
                            string(0) ""
                            ["city"]=>
                            NULL
                            ["zip"]=>
                            NULL
                          }

                             * 
                             */
                            
                            /**
                             * TWITTER
                             */
                            /*
                             object(Hybrid_User_Profile)#29 (22) {
                            ["identifier"]=>
                            int(300187659)
                            ["webSiteURL"]=>
                            NULL
                            ["profileURL"]=>
                            string(25) "http://twitter.com/dyarfi"
                            ["photoURL"]=>
                            string(75) "http://pbs.twimg.com/profile_images/417721509696634880/tKSK06gY_normal.jpeg"
                            ["displayName"]=>
                            string(6) "dyarfi"
                            ["description"]=>
                            string(0) ""
                            ["firstName"]=>
                            string(13) "Defrian Yarfi"
                            ["lastName"]=>
                            NULL
                            ["gender"]=>
                            NULL
                            ["language"]=>
                            NULL
                            ["age"]=>
                            NULL
                            ["birthDay"]=>
                            NULL
                            ["birthMonth"]=>
                            NULL
                            ["birthYear"]=>
                            NULL
                            ["email"]=>
                            NULL
                            ["emailVerified"]=>
                            NULL
                            ["phone"]=>
                            NULL
                            ["address"]=>
                            NULL
                            ["country"]=>
                            NULL
                            ["region"]=>
                            string(17) "Bekasi, Indonesia"
                            ["city"]=>
                            NULL
                            ["zip"]=>
                            NULL
                          
                             */
                        
    
                    }
                    
					$this->load->view('hauth/done',$data);
				}
				else // Cannot authenticate user
				{
					show_error('Cannot authenticate user');
				}
			}
			else // This service is not enabled.
			{
				log_message('error', 'controllers.HAuth.login: This provider is not enabled ('.$provider.')');
				show_404($_SERVER['REQUEST_URI']);
			}
		}
		catch(Exception $e)
		{
			$error = 'Unexpected error';
			switch($e->getCode())
			{
				case 0 : $error = 'Unspecified error.'; break;
				case 1 : $error = 'Hybriauth configuration error.'; break;
				case 2 : $error = 'Provider not properly configured.'; break;
				case 3 : $error = 'Unknown or disabled provider.'; break;
				case 4 : $error = 'Missing provider application credentials.'; break;
				case 5 : log_message('debug', 'controllers.HAuth.login: Authentification failed. The user has canceled the authentication or the provider refused the connection.');
				         //redirect();
                         //print_r($e);
                         //exit;
				         if (isset($service))
				         {
				         	log_message('debug', 'controllers.HAuth.login: logging out from service.');
				         	$service->logout();
				         }
                         redirect(base_url('hauth/done'));
				         show_error('User has cancelled the authentication or the provider refused the connection.');
				         break;
				case 6 : $error = 'User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again.';
				         break;
				case 7 : $error = 'User not connected to the provider.';
				         break;
			}

			if (isset($service))
			{
				$service->logout();
			}

			log_message('error', 'controllers.HAuth.login: '.$error);
			show_error('Error authenticating user.');
		}
	}

	public function endpoint()
	{

		log_message('debug', 'controllers.HAuth.endpoint called.');
		log_message('info', 'controllers.HAuth.endpoint: $_REQUEST: '.print_r($_REQUEST, TRUE));

		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			log_message('debug', 'controllers.HAuth.endpoint: the request method is GET, copying REQUEST array into GET array.');
			$_GET = $_REQUEST;
		}

		log_message('debug', 'controllers.HAuth.endpoint: loading the original HybridAuth endpoint script.');
		require_once APPPATH.'/third_party/hybridauth/index.php';

	}
}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
