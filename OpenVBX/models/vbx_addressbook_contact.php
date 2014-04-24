<?php
/**
 * "The contents of this file are subject to the Mozilla Public License
 *  Version 1.1 (the "License"); you may not use this file except in
 *  compliance with the License. You may obtain a copy of the License at
 *  http://www.mozilla.org/MPL/

 *  Software distributed under the License is distributed on an "AS IS"
 *  basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See the
 *  License for the specific language governing rights and limitations
 *  under the License.

 *  The Original Code is OpenVBX, released June 15, 2010.

 *  The Initial Developer of the Original Code is Twilio Inc.
 *  Portions created by Twilio Inc. are Copyright (C) 2010.
 *  All Rights Reserved.

 * Contributor(s):
 **/

class VBX_Addressbook_ContactException extends Exception {}

/*
 * Address Book Class
 */
class VBX_Addressbook_Contact extends Model {

    public $table = 'addressbook_contacts';

    public function __construct()
    {
        parent::__construct();
    }


    function get_contacts_query($options)
    {
        $ci =& get_instance();
        $user = isset($options['user'])? $options['user'] : array();

        $ci->db
             ->select("addressbook_contacts.*", false)
             ->where('addressbook_contacts.phone', $options['phone'])
             ->order_by('addressbook_contacts.created DESC')
             ->from($this->table);

        return $ci->db;
    }


    function get_contacts($options)
    {
        $query = $this->get_contacts_query($options);
        $result['total'] = $query->count_all_results();
        $query = $this->get_contacts_query($options);
        $result['addressbook_contacts'] = $query
             ->limit($size, $offset)
             ->get()
             ->result();

        return $result;
    }

}
