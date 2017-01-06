<?php

require 'inclusionReference.php';

/**
 * Class Mailchimp
 */
class Mailchimp
{

    public $auth;
    public $url;
    public $exp_apikey;
    public $apikey;
    public $response;

    // Instantiations for child classes
    public $account;
    public $apps;
    public $automations;
    public $batches;
    public $campaign_folders;
    public $campaigns;
    public $conversations;
    public $ecomm_stores;
    public $file_manager_files;
    public $file_manager_folders;
    public $lists;
    public $reports;
    public $search_campaigns;
    public $search_members;
    public $template_folders;
    public $templates;

    public function __construct($apikey)
    {
        $this->exp_apikey = explode('-', $apikey);
        $this->auth = array(
            'Authorization: apikey ' . $this->exp_apikey[0] . '-' . $this->exp_apikey[1]
        );
        $this->url = "Https://" . $this->exp_apikey[1] . ".api.mailchimp.com/3.0";
        $this->apikey = $apikey;
    }

    // ROOT OBJECT FUNCTIONS

    /**
     * Prepares Account Object
     *
     * @return Mailchimp_Account
     */
    public function account()
    {
        $this->account = new Mailchimp_Account($this->apikey);
        return $this->account;
    }

    /**
     * Prepares Authorized_Apps Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Authorized_Apps
     */
    public function apps( $class_input = null )
    {
        $this->apps = new Authorized_Apps($this->apikey, $class_input);
        return $this->apps;
    }

    /**
     * Prepares Automations object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Automations
     */
    public function automations( $class_input = null )
    {
        $this->automations = new Automations($this->apikey, $class_input);
        return $this->automations;
    }

    /**
     * Prepares Batch_Operations Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Batch_Operations
     */
    public function batches( $class_input = null )
    {
        $this->batches = new Batch_Operations($this->apikey, $class_input);
        return $this->batches;
    }

    /**
     * Prepares Campaigns_Folders Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Campaign_Folders
     */
    public function campaignFolders( $class_input = null )
    {
        $this->campaign_folders = new Campaign_Folders($this->apikey, $class_input);
        return $this->campaign_folders;
    }

    /**
     * Prepares Campaigns Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Campaigns
     */
    public function campaigns( $class_input = null )
    {
        $this->campaigns = new Campaigns($this->apikey, $class_input);
        return $this->campaigns;
    }

    /**
     * Prepares Conversations Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Conversations
     */
    public function conversations( $class_input = null )
    {
        $this->conversations = new Conversations($this->apikey, $class_input);
        return $this->conversations;
    }

    /**
     * Prepares Ecommerce_Stores Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Ecommerce_Stores
     */
    public function ecommStores( $class_input = null )
    {
        $this->ecomm_stores = new Ecommerce_Stores($this->apikey, $class_input);
        return $this->ecomm_stores;
    }

    /**
     * Prepares File_Manager_Files Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object File_Manager_Files
     */
    public function fileManagerFiles(  $class_input = null )
    {
        $this->file_manager_files = new File_Manager_Files(
            $this->apikey,
            $class_input
        );
        return $this->file_manager_files;
    }

    /**
     * Prepares File_Manager_Folders Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object File_Manager_Folders
     */
    public function fileManagerFolders( $class_input = null )
    {
        $this->file_manager_folders = new File_Manager_Folders(
            $this->apikey,
            $class_input
        );
        return $this->file_manager_folders;
    }

    /**
     * Prepares Lists Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Lists
     */
    public function lists( $class_input = null )
    {
        $this->lists = new Lists($this->apikey, $class_input);
        return $this->lists;
    }

    /**
     * Prepares Reports Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Reports
     */
    public function reports( $class_input = null )
    {
        $this->reports = new Reports($this->apikey, $class_input);
        return $this->reports;
    }

    /**
     * Prepares Search_Campaigns Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Search_Campaigns
     */
    public function searchCampaigns( $class_input = null )
    {
        $this->search_campaigns = new Search_Campaigns($this->apikey, $class_input);
        return $this->search_campaigns;
    }

    /**
     * Prepares Search_Members Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Search_Members
     */
    public function searchMembers( $class_input = null )
    {
        $this->search_members = new Search_Members($this->apikey, $class_input);
        return $this->search_members;
    }

    /**
     * Prepares Template_Folders Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Template_Folders
     */
    public function templateFolders( $class_input = null )
    {
        $this->template_folders = new Template_Folders($this->apikey, $class_input);
        return $this->template_folders;
    }

    /**
     * Prepares Templates Object
     *
     * @param null $class_input An optional unique identifier for an instance of this
     *
     * @return object Templates
     */
    public function templates( $class_input = null )
    {
        $this->templates = new Templates($this->apikey, $class_input);
        return $this->templates;
    }

    // VERBS
    // GET ----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * A public function used to abstract out curl syntax
     *
     * @param string $url GET URL
     *
     * @return mixed
     */
    public function curlGet($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // POST ----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * A public function used to abstract out curl syntax
     *
     * @param string $url     POST URL
     * @param mixed  $payload JSON Encoded Payload
     *
     * @return mixed
     */
    public function curlPost($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // PATCH ----------------------------------------------------------------------------------------------------------------------------------------

    /**
     *  A public function used to abstract out curl syntax
     *
     * @param string $url     PATCH URL
     * @param mixed  $payload JSON Encoded Payload
     *
     * @return mixed
     */
    public function curlPatch($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // DELETE ----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * A public function used to abstract out curl syntax
     *
     * @param string $url DELETE URL
     *
     * @return mixed
     */
    public function curlDelete($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // PUT ----------------------------------------------------------------------------------------------------------------------------------------

    /**
     * A public function used to abstract out curl syntax
     *
     * @param string $url     PUT URL
     * @param mixed  $payload JSON Encoded Payload
     *
     * @return mixed
     */
    public function curlPut($url, $payload)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->auth);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $this->response = curl_exec($ch);
        curl_close($ch);

        return json_decode($this->response, false);
    }

    // END VERBS -----------------------------------------------------------------------------------------------------------------------------------

    /**
     * A function that takes an array of key value pairs and outputs a query string
     *
     * @param array $query_input Array of key value pairs
     *
     * @return string
     */
    public function constructQueryParams($query_input)
    {
        $query_string = '?';
        foreach ($query_input as $parameter => $value) {
            $encoded_value = urlencode($value);
            $query_string .= $parameter . '=' . $encoded_value . '&';
        }
        $query_string = trim($query_string, '&');
        return $query_string;
    }

}
