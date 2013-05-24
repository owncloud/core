<?php

/**
 * A found book (in reality, a PDF)
 */
class OC_Search_Result_Book extends OC_Search_Result_File {
    /**
     * Type name; translated in templates
     * @var string 
     */

    const TITLE = 'Books';

    /**
     * Default columns to display in list view
     * @var string
     */
    public $default_columns = array('name', 'author', 'size', 'modified', 'actions');

    /**
     * Book author
     * @var string
     */
    public $author;

    /**
     * Book subject
     * @var string
     */
    public $subject;

    /**
     * Book keywords
     * @var string
     */
    public $keywords;

    /**
     * Fill the current result with the given data
     * @param string $id
     */
    public function fill(array $data) {
        parent::fill($data);
        // fill from PDF tags
        require_once 'Zend/Pdf.php'; // fix
        $pdf = Zend_Pdf::parse(\OC\Files\Filesystem::file_get_contents($this->path));
        if (isset($pdf->properties['Title'])) {
            $this->name = $pdf->properties['Title'];
        }
        if (isset($pdf->properties['Author'])) {
            $this->author = $pdf->properties['Author'];
        }
        if (isset($pdf->properties['Subject'])) {
            $this->subject = $pdf->properties['Subject'];
        }
        if (isset($pdf->properties['Keywords'])) {
            $this->keywords = $pdf->properties['Keywords'];
        }
    }

}