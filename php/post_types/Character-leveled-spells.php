<?php
  add_action('admin_init', 'add_meta_boxes', 1);
  function add_meta_boxes() {
    add_meta_box( 'repeatable-fields', 'Character Spells', 'repeatable_meta_box_display', 'character', 'side');
  }
  function repeatable_meta_box_display() {
    global $post;
    $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
    wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );

    $level1 = get_post_meta($post->ID, 'level_1', true);
    $level2 = get_post_meta($post->ID, 'level_2', true);  ?>

    <script type="text/javascript"> <?php
      for ($i1 = 0; $i1 <= $level1 ; $i1 ++) {  ?>
        jQuery(document).ready(function($) {
          $('#add-row-<?=$i1?>').on('click', function() {
            var row = $('.empty-row-<?=$i1?>.screen-reader-text').clone(true);
            row.removeClass('empty-row-<?=$i1?> screen-reader-text');
            row.insertBefore('#repeatable-fieldset-<?=$i1?> tbody>tr:last');
            return false;
          });
          $('.remove-row').on('click', function() {
            $(this).parents('tr').remove();
            return false;
          });
          $('#repeatable-fieldset-<?=$i1?> tbody').sortable({
            opacity: 0.6,
            revert: true,
            cursor: 'move',
            handle: '.sort'
          });
        }); <?php
      } ?>
    </script> <?php
    for ($i1 = 0; $i1 <= $level1 ; $i1 ++) { ?>
      <h3><?=($i1==0?"Cantrips":"Level $i1")?></h3>
      <table id="repeatable-fieldset-<?=$i1?>" width="100%">
        <thead>
          <tr>
            <th width="2%"></th>
            <th width="50%">Name</th>
            <th width="2%"></th>
          </tr>
        </thead>
        <tbody> <?php
          if ( $repeatable_fields ) :
          foreach ( $repeatable_fields as $field ) { ?>
            <tr>
              <td><a class="button remove-row" href="#">-</a></td>
              <td><input type="text" class="widefat" name="spell[]" value="<?php if($field['spell'] != '') echo esc_attr( $field['spell'] ); ?>" /></td>
              <td><a class="sort">|||</a></td>
            </tr> <?php
          }
          else : // show a blank one ?>

          <tr>
            <td><a class="button remove-row" href="#">-</a></td>
            <td><input type="text" class="widefat" name="spell[]" /></td>
            <td><a class="sort">|||</a></td>
          </tr>
          <?php endif; ?>

          <!-- empty hidden one for jQuery -->
          <tr class="empty-row-<?=$i1?> screen-reader-text">
            <td><a class="button remove-row" href="#">-</a></td>
            <td><input type="text" class="widefat" name="spell[]" /></td>
            <td><a class="sort">|||</a></td>
          </tr>
        </tbody>
      </table>

      <p><a id="add-row-<?=$i1?>" class="button" href="#">Add <?=($i1==0?"Cantrip":"Level $i1 Spell")?></a></p> <?php
    }
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
      $count = count( $spells );
      for ( $i = 0; $i < $count; $i++ ) {
        if ( $spells[$i] != '' )
          $new[$i]['spell'] = stripslashes( strip_tags( $spells[$i] ) );
      }
      if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'repeatable_fields', $new );
      elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'repeatable_fields', $old );
    }
