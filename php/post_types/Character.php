<?php
  function cptui_register_my_cpts_character() {

  /**
   * Post Type: Characters.
   */

  $labels = array(
    "name" => __( "Characters", "" ),
    "singular_name" => __( "Character", "" ),
  );

  $args = array(
    "label" => __( "Characters", "" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => false,
    "rest_base" => "",
    "has_archive" => false,
    "show_in_menu" => true,
    "exclude_from_search" => true,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "character", "with_front" => true ),
    "query_var" => true,
    "menu_position" => 5,
    "menu_icon" => "dashicons-id-alt",
    "supports" => array( "title" ),
  );

  register_post_type( "character", $args );
  }

  add_action( 'init', 'cptui_register_my_cpts_character' );

  //spells field ===============================================================

  add_action('admin_init', 'add_meta_boxes', 1);
  function add_meta_boxes() {
    add_meta_box( 'repeatable-fields', 'Character Spells', 'repeatable_meta_box_display', 'character', 'side');
  }
  function repeatable_meta_box_display() {
    global $post;
    $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
    wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );

    //build spell options
    $all_spells = new WP_query(array('post_type' => 'spell', 'posts_per_page' => -1));

    $spell_options = array();

    if ($all_spells->have_posts()) {
      while ($all_spells->have_posts()) { $all_spells->the_post();
        array_push($spell_options, array('title' => get_the_title(), 'value' => get_the_ID()));
      }
    }

    wp_reset_query(); ?>

    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $('#add-row').on('click', function() {
          var row = $('.empty-row.screen-reader-text').clone(true);
          row.removeClass('empty-row screen-reader-text');
          row.insertBefore('#repeatable-fieldset tbody>tr:last');
          return false;
        });
        $('.remove-row').on('click', function() {
          $(this).parents('tr').remove();
          return false;
        });
        $('#repeatable-fieldset tbody').sortable({
          opacity: 0.6,
          revert: true,
          cursor: 'move',
          handle: '.sort'
        });
      });
    </script>

    <table id="repeatable-fieldset" width="100%">
      <thead>
        <tr>
          <th width="2%"></th>
          <th width="50%">Spell</th>
          <th width="5%">Level</th>
          <th width="2%"></th>
        </tr>
      </thead>
      <tbody> <?php
        if ( $repeatable_fields ) :
          foreach ( $repeatable_fields as $field ) { ?>
            <tr>
              <td><a class="button remove-row" href="#">-</a></td>
              <td>
                <select name="spell[]" class="widefat">
                  <option value="-1">-- Select a Spell --</option> <?php
                  foreach ($spell_options as $option) {
                    if($field['spell'] == $option['value']) { ?>
                    <option selected value="<?=$option['value']?>"><?=$option['title']?></option> <?php
                    }
                    else { ?>
                      <option value="<?=$option['value']?>"><?=$option['title']?></option> <?php
                    }
                  } ?>
                </select>
              </td>
              <td><input type="text" class="widefat" name="level[]" value="<?php if($field['level'] != '') echo esc_attr( $field['level'] ); ?>" /></td>
              <td><a class="sort">|||</a></td>
            </tr> <?php
          }
        else : // show a blank one ?>
          <tr>
            <td><a class="button remove-row" href="#">-</a></td>
            <td>
              <select name="spell[]" class="widefat">
                <option value="-1">-- Select a Spell --</option> <?php
                foreach ($spell_options as $option) { ?>
                  <option value="<?=$option['value']?>"><?=$option['title']?></option> <?php
                } ?>
              </select>
            </td>
            <td><input type="text" class="widefat" name="level[]" /></td>
            <td><a class="sort">|||</a></td>
          </tr> <?php
        endif; ?>

        <!-- empty hidden one for jQuery -->
        <tr class="empty-row screen-reader-text">
          <td><a class="button remove-row" href="#">-</a></td>
          <td>
            <select name="spell[]" class="widefat">
              <option value="-1">-- Select a Spell --</option> <?php
              foreach ($spell_options as $option) { ?>
                <option value="<?=$option['value']?>"><?=$option['title']?></option> <?php
              } ?>
            </select>
          </td>
          <td><input type="text" class="widefat" name="level[]" /></td>
          <td><a class="sort">|||</a></td>
        </tr>
      </tbody>
    </table>

    <p><a id="add-row" class="button" href="#">Add Spell</a></p> <?php
  }

    add_action('save_post', 'repeatable_meta_box_save');
    function repeatable_meta_box_save($post_id) {
      if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
        return;

      if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

      if (!current_user_can('edit_post', $post_id))
        return;

      $old = get_post_meta($post_id, 'repeatable_fields', true);
      $new = array();
      $spells = $_POST['spell'];
      // var_dump($spells);
      // die;
      $levels = $_POST['level'];
      $count = count( $spells );
      for ( $i = 0; $i < $count; $i++ ) {
        if ( $spells[$i] != '' && $spells[$i] != "-1") {
          $new[$i]['spell'] = stripslashes( strip_tags( $spells[$i] ) );
          $new[$i]['level'] = stripslashes( strip_tags( $levels[$i] ) );
        }
      }
      if ( !empty( $new ) && $new != $old ) {
        update_post_meta( $post_id, 'repeatable_fields', $new );
      }
      elseif ( empty($new) && $old ) {
        delete_post_meta( $post_id, 'repeatable_fields', $old );
      }
    }
