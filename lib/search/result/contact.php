<?php

/**
 * A found contact
 */
class OC_Search_Result_Contact extends OC_Search_Result {
    /**
     * Type name; translated in templates
     * @var string 
     */

    const TITLE = 'Contacts';

    /**
     * Default columns to display in list view
     * @var string
     */
    public $default_columns = array('name', 'telephone', 'email', 'actions');

    /**
     * Organization
     * @var string
     */
    public $organization;

    /**
     * Nickname
     * @var string
     */
    public $nickname;

    /**
     * Birthday
     * @var string
     */
    public $birthday;

    /**
     * Telephone number
     * @var string
     */
    public $telephone;

    /**
     * E-mail address
     * @var string
     */
    public $email;

    /**
     * Instant messaging ID
     * @var string
     */
    public $instant_messaging;

    /**
     * Address
     * @var string
     */
    public $address;

    /**
     * Note
     * @var string
     */
    public $note;

    /**
     * URL
     * @var string
     */
    public $url;

    /**
     * Groups/categories
     * @var string
     */
    public $groups;

    /**
     * Return a filled result from the given ID
     * @param string $id path to file
     */
    public static function fillFromId($id) {
        $card = \OCA\Contacts\VCard::find($id);
        if (!$card) {
            return null;
        }
        // create search result
        $result = new OC_Search_Result_Contact($id, '', '', '');
        // fill from file data
        $result->fill($card);
        // return
        return $result;
    }

    /**
     * Fill the current result with the given data
     * @param string $id
     */
    public function fill(array $data) {
        $this->id = $data['id'];
        $this->name = $data['fullname'];
        $this->link = \OCP\Util::linkTo('contacts', 'index.php', array('id' => $data['id']));
        $this->actions = self::format_actions();
        // parse vcard
        $vcard = \Sabre\VObject\Reader::read($data['carddata']);
        $this->organization = self::format_property($vcard->ORG);
        $this->address = self::format_property($vcard->ADR);
        $this->birthday = self::format_property($vcard->BDAY);
        $this->email = self::format_property($vcard->EMAIL);
        $this->groups = self::format_property($vcard->CATEGORIES);
        $this->instant_messaging = self::format_property($vcard->IMPP);
        $this->nickname = self::format_property($vcard->NICKNAME);
        $this->notes = self::format_property($vcard->NOTE);
        $this->organization = self::format_property($vcard->ORG);
        $this->telephone = self::format_property($vcard->TEL);
        $this->url = self::format_property($vcard->URL);
    }

    /**
     * Format select fields to HTML; applies htmlentities() to all
     * @TODO special format for address
     */
    public function formatToHtml() {
        foreach ($this as $property => $value) {
            if ($property == 'id' || $property == 'link')
                continue;
            $this->property = htmlentities($value);
        }
        $this->name = self::format_name($this->name);
    }

    /**
     * Format the property value to a human-readable representation
     * @param Sabre\VObject\Property $property
     * @return string
     */
    function format_property($property) {
        if ($property == null) {
            return '';
        }
        $value = $property->__toString();
        return $value;
    }

    /**
     * Add an icon to the name
     * @param $name 
     * @return string
     */
    function format_name($name) {
        // add icon
        $url = \OCP\image_path('', 'actions/user.svg');
        // add filename
        return '<span class="has-icon" style="background-image: url(' . $url . ');">' . htmlspecialchars($name) . '</span>';
    }

    /**
     * Create actions HTML
     * @TODO
     * @param array $data
     * @return string
     */
    function format_actions() {
        $output_html = '<ul class="search_actions">';
        $url = \OCP\Util::linkTo('contacts', 'index.php');
        $l = OC_L10N::get('search');
        $output_html .= "<li><a href=\"{$url}\">".$l->t('Open')."</a></li>";
        return $output_html . '</ul>';
    }

}