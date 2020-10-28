<?php

/*
Plugin Name: OWT WP Widget
Descreption:This is sample plugin
version:1.0
Author:mitul
*/

class OWT_WP_Widget extends WP_Widget{
    public function __construct(){
        //Intialize widget name
        parent::__construct("owt-wp-widget","OWT WP Widget");
        add_action("widgets_init",function(){
            register_widget("OWT_WP_Widget");
        });
    }
    public function form($instance){
        //admin panel layout
        $title = !empty($instance['title']) ? $instance['title'] : "";
        $descreption = !empty($instance['descreption']) ? $instance['descreption'] : "";
        ?>
            <p>
                <label for="<?php echo $this->get_field_id('txt_title')  ?>">Widget Title</label>
                <input type="text" name="<?php echo $this->get_field_name('txt_title') ?>" class="widefat"
                 id="<?php echo $this->get_field_id('txt_title')  ?>" value="<?php echo $title; ?>" 
                 placeholder="Enter Widget Title"/>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('descreption') ?>">Descreption</label>
                <textarea class="widefat" id="<?php echo $this->get_field_id('descreption')  ?>" 
                name="<?php echo $this->get_field_name('descreption') ?>"  
                placeholder="Descreption"><?php echo $descreption; ?></textarea>
            </p>
        <?php 
    }
    public function widget($args, $instance){
        //front-end layout
        echo $args['before_title'];
        if(!empty($instance['title'])){
            echo $instance['title'];
        }
        echo $args['after_title'];

        echo $args['before_widget'];
        if(!empty($instance['descreption'])){
            echo $instance['descreption'];
        }
        echo $args['after_widget'];
    }
    public function update( $new_instance, $old_instance ){
        //save or update widget value in database
        $instance = array();
        $instance['title'] = isset($new_instance['txt_title']
        ) ? strip_tags($new_instance['txt_title']) : "";

        $instance['descreption'] = isset($new_instance['descreption']
        ) ? strip_tags($new_instance['descreption']) : "";

        return $instance;
    }
}
$owt_wp_widget = new OWT_WP_Widget();
?>