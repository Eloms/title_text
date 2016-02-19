<?php

// Title Text block's proper namespace
namespace Application\Block\TitleText;

// include the core block controller from Concrete5
use Concrete\Core\Block\BlockController;
use Core;

defined('C5_EXECUTE') or die('Access Denied.');

class Controller extends BlockController
{
    // The block's primary database table
    protected $btTable = "btTitleText";
    //The width in pixels of the modal popup dialog box
    protected $btInterfaceWidth = "350";
    //The height in pixels of the modal popup dialog box
    protected $btInterfaceHeight = "240";

    // the block type will be installed in this set automatically
    protected $btDefaultSet = 'basic';


    /**
    * Get bockTypeName
    *
    * @return string
    */
    public function getBlockTypeName()
    {
        return t('Title & Text');
    }

        
    /**
    * Validate user input 
    * 
    * @param  $data 
    * @return Concrete\Core\Error\Error() 
    */ 
    public function validate($data)
    {
        
        $e = Core::make('error');
        if (!$data['titlefield']) {
            $e->add(t('Please enter a title .'));
        }
        return $e;
    }

    /**
    * Get bock type descritption
    *
    * @return string
    */
    public function getBlockTypeDescription()
    {
        return t('This sample block allow user to edit a text and his title');
    }

    /**
    * Save form input in the database after validation
    * 
    * @param  $data 
    */ 
    public function save($data)
    {

        $data['titlefield'] = htmlspecialchars($data['titlefield']); // escaping before saving           
        // check if the textfield is empty then, complete it by the default text
        if(isset($data['textfield'])) {
            $data['textfield'] = "Lorem ipsum <br/>
                                Blocks are the Concrete way of embedding bits of content and functionality into your pages. 
                                Learn more about how the end user adds blocks to pages here.
                                Out the box, Concrete5 comes with a number of blocks. However, 
                                while these are enough to get a lot of sites up and running, the first thing many Concrete5
                                developers will do is to play around with the blocks architecture. 
                                This might just be a change to a block's presentation layer; or you might need to create something completely new, 
                                like an event, calendar or product block. Fortunately, 
                                working with blocks in Concrete5 is a pretty simple process." ;  }
        else 
        {
            $data['textfield'] =  htmlspecialchars($data['textfield']); // escaping before saving
        }
        parent::save($data);
    }
}
