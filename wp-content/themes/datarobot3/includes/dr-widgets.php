<?php

class dr_pp_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'dr_pp_widget',
            __('Popular posts', 'dr_widget_domain'),
            array('description' => __('Popular posts widget. Posts are selected manually', 'dr_widget_domain'),)
        );
    }

    public function widget($args, $instance)
    {
        $title = apply_filters('widget_title', $instance['title']);
        echo $args['before_widget'];

        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];

        include(get_template_directory() . '/includes/popular-posts-widget.php');

        echo $args['after_widget'];
    }


    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'dr_widget_domain');
        }

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

// Register and load the widget
function dr_load_pp_widget()
{
    register_widget('dr_pp_widget');
}

add_action('widgets_init', 'dr_load_pp_widget');

?>
