<?php $meta = get_post_meta(get_the_ID());
      $id = get_the_ID();?>
<div class="character-content full">
  <div id="header" class="row between">
    <div class="player-title col col-6">
      <h2><?=get_the_title()?></h2>
      <h4>
        Level <?=intval(get_post_meta($id, 'level_1', true)) + intval(get_post_meta($id, 'level_2', true))?><span> </span>
        <?=get_post_meta($id, 'race', true)?><span> </span>
        <?=get_post_meta($id, 'class_1', true)?>
        <?=empty(get_post_meta($id, 'class_2', true))?"<span> / <span>".get_post_meta($id, 'class_2', true):""?>
      </h4>
    </div>
    <div class="health col col-6">
      <div class="readout">
        <span class="current"><?=get_post_meta($id, 'hp', true)?></span>
        <span class="div">/</span>
        <span class="max"><?=get_post_meta($id, 'hp', true)?></span> HP
      </div>
      <div class="buttons">
        <button class="sub"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
        <input type="number" value="1">
        <button class="add"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
      </div>
      <button class="full"><i class="fa fa-heart" aria-hidden="true"></i> Full Health</button>
    </div>
  </div>
  <div id="character-stats" class="row gutters">
    <div class="col col-6">
      <div data-component="collapse">
        <a href="#base-stats" class="collapse-toggle"><h3>Base Stats</h3></a>
        <div class="collapse-box hide" id="base-stats">
          <div class="row">
            <div class="col col-6">
              <table class="fancy-w-headers">
                <tr>
                  <th></th>
                  <th>Base</th>
                  <th>Mod</th>
                  <th>Save</th>
                </tr>
                <tr>
                  <td>STR</td>
                  <td><?=get_post_meta($id, 'str', true)?></td>
                  <td><?=get_post_meta($id, 'str-mod', true)?></td>
                  <td><?=get_post_meta($id, 's-str', true)?></td>
                </tr>
                <tr>
                  <td>DEX</td>
                  <td><?=get_post_meta($id, 'dex', true)?></td>
                  <td><?=get_post_meta($id, 'dex-mod', true)?></td>
                  <td><?=get_post_meta($id, 's-dex', true)?></td>
                </tr>
                <tr>
                  <td>CON</td>
                  <td><?=get_post_meta($id, 'con', true)?></td>
                  <td><?=get_post_meta($id, 'con-mod', true)?></td>
                  <td><?=get_post_meta($id, 's-con', true)?></td>
                </tr>
                <tr>
                  <td>INT</td>
                  <td><?=get_post_meta($id, 'int', true)?></td>
                  <td><?=get_post_meta($id, 'int-mod', true)?></td>
                  <td><?=get_post_meta($id, 's-int', true)?></td>
                </tr>
                <tr>
                  <td>WIS</td>
                  <td><?=get_post_meta($id, 'wis', true)?></td>
                  <td><?=get_post_meta($id, 'wis-mod', true)?></td>
                  <td><?=get_post_meta($id, 's-wis', true)?></td>
                </tr>
                <tr>
                  <td>CHA</td>
                  <td><?=get_post_meta($id, 'cha', true)?></td>
                  <td><?=get_post_meta($id, 'cha-mod', true)?></td>
                  <td><?=get_post_meta($id, 's-cha', true)?></td>
                </tr>
                <tr>
                  <td>HP</td>
                  <td><?=get_post_meta($id, 'hp', true)?></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
              <table class="table-horizontal-only">
                <tr>
                  <td>Initiative</td><td><?=$meta['initiative'][0]?></td>
                </tr>
                <tr>
                  <td>Melee Attack</td><td><?=$meta['melee_attack'][0]?></td>
                </tr>
                <tr>
                  <td>Ranged Attack</td><td><?=$meta['ranged_attack'][0]?></td>
                </tr>
                <tr>
                  <td>Spell Attack</td><td><?=$meta['spell_attack'][0]?></td>
                </tr>
                <tr>
                  <td>Armor Class</td><td><?=$meta['armor_class'][0]?></td>
                </tr>
                <!-- <tr>
                  <td>Passive Resistance</td><td><?=$meta['passive_resistance'][0]?></td>
                </tr> -->
                <!-- <tr>
                  <td>Spell Resistance</td><td><?=$meta['spell_resistance'][0]?></td>
                </tr> -->
                <!-- <tr>
                  <td>Proficiency Bonus</td><td><?=$meta['proficiency_bonus'][0]?></td>
                </tr> -->
              </table>
            </div>
            <div class="col col-6">
              <div>
                <h4>
                  Skills
                </h4>
                <table class="table-horizontal-only">
                  <tr>
                    <td>Acrobatics</td><td><?=$meta['acrobatics'][0]?></td>
                  </tr>
                  <tr>
                    <td>Concentration</td><td><?=$meta['concentration'][0]?></td>
                  </tr>
                  <tr>
                    <td>Disguise</td><td><?=$meta['disguise'][0]?></td>
                  </tr>
                  <tr>
                    <td>Handle Animal</td><td><?=$meta['handle_animal'][0]?></td>
                  </tr>
                  <tr>
                    <td>Innovate</td><td><?=$meta['innovate'][0]?></td>
                  </tr>
                  <tr>
                    <td>Intimidate</td><td><?=$meta['intimidate'][0]?></td>
                  </tr>
                  <tr>
                    <td>Knowledge Arcana</td><td><?=$meta['knowledge_arcana'][0]?></td>
                  </tr>
                  <tr>
                    <td>Knowledge Divine</td><td><?=$meta['knowledge_divine'][0]?></td>
                  </tr>
                  <tr>
                    <td>Knowledge General</td><td><?=$meta['knowledge_general'][0]?></td>
                  </tr>
                  <tr>
                    <td>Knowledge Geography</td><td><?=$meta['knowledge_geography'][0]?></td>
                  </tr>
                  <tr>
                    <td>Knowledge Lore</td><td><?=$meta['knowledge_lore'][0]?></td>
                  </tr>
                  <tr>
                    <td>Knowledge Nature</td><td><?=$meta['knowledge_nature'][0]?></td>
                  </tr>
                  <tr>
                    <td>Magic Device</td><td><?=$meta['magic_device'][0]?></td>
                  </tr>
                  <tr>
                    <td>Memory</td><td><?=$meta['memory'][0]?></td>
                  </tr>
                  <tr>
                    <td>Perception</td><td><?=$meta['perception'][0]?></td>
                  </tr>
                  <tr>
                    <td>Perform</td><td><?=$meta['perform'][0]?></td>
                  </tr>
                  <tr>
                    <td>Profession</td><td><?=$meta['profession'][0]?></td>
                  </tr>
                  <tr>
                    <td>Stealth</td><td><?=$meta['stealth'][0]?></td>
                  </tr>
                  <tr>
                    <td>Survival</td><td><?=$meta['survival'][0]?></td>
                  </tr>
                  <tr>
                    <td>Teach</td><td><?=$meta['teach'][0]?></td>
                  </tr>
                  <tr>
                    <td>Tinker</td><td><?=$meta['tinker'][0]?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-6">
      <div data-component="collapse">
        <a href="#classes" class="collapse-toggle"><h3>Class Info</h3></a>
        <div class="collapse-box hide" id="classes">
          <div class="row">
            <div class="col col-6">
              <div>
                <h4>First Class</h4>
                <br>
                <div class="class">Class: <?=get_post_meta($id, 'class_1', true)?></div>
                <div class="level">Level: <?=get_post_meta($id, 'level_1', true)?></div>
                <div> <?php
                  $content = get_post_meta($id, 'traits_1', true);
                  $content = apply_filters('the_content', $content);

                  echo "Traits: ".$content; ?>
                </div>
                <div class="sub-class">Subclass: <?=get_post_meta($id, 'subclass_1', true)?></div>
                <div class="traits">Abilities: <?=get_post_meta($id, 'abilities_1', true)?></div>
              </div>
            </div>
            <div class="col col-6">
              <div>
                <h4>Second Class</h4>
                <br>
                <div class="class">Class: <?=get_post_meta($id, 'class_2', true)?></div>
                <div class="level">Level: <?=get_post_meta($id, 'level_2', true)?></div>
                <div> <?php
                  $content = get_post_meta($id, 'traits_2', true);
                  $content = apply_filters('the_content', $content);

                  echo "Traits: ".$content; ?>
                </div>
                <div class="sub-class">Subclass: <?=get_post_meta($id, 'subclass_2', true)?></div>
                <div class="traits">Abilities: <?=get_post_meta($id, 'abilities_2', true)?></div>
              </div>
            </div>
          </div>
          <br><br>
          <hr>
          <br><br>
          <div class="col col-12">
            <div>
              <div> <?php
                $content = get_post_meta($id, 'passive-traits', true);
                $content = apply_filters('the_content', $content); ?>
                <h4>Passive Traits</h4> <?php
                echo $content; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-12">
      <div data-component="collapse">
        <a href="#general" class="collapse-toggle"><h3>General Info</h3></a>
        <div class="collapse-box hide" id="general">
          <div class="row">
            <div class="col col-6">
              <div>
                <div>Full Name: <?=get_post_meta($id, 'name', true)?></div>
                <div>Age: <?=get_post_meta($id, 'age', true)?></div>
                <div>Race: <?=get_post_meta($id, 'race', true)?></div>
                <div>Gender: <?=get_post_meta($id, 'gender', true)?></div>
                <div>Continent of Origin: <?=get_post_meta($id, 'continent_of_origin', true)?></div>
                <div>Hometown: <?=get_post_meta($id, 'home_town', true)?></div>
                <div>Family Class Status: <?=get_post_meta($id, 'family_class_status', true)?></div>
                <div>Occupation: <?=get_post_meta($id, 'occupation', true)?></div>
                <div>Deity: <?=get_post_meta($id, 'deity', true)?></div>
                <div>Known Languages: <?=get_post_meta($id, 'known_languages', true)?></div>
                <div> <?php
                  $content = get_post_meta($id, 'reason_for_adventuring', true);
                  $content = apply_filters('the_content', $content);

                  echo "Reason for Adventuring: ".$content; ?>
                </div>
              </div>
            </div>
            <div class="col col-6">
              <div> <?php
                $content = get_post_meta($id, 'previous_relationships', true);
                $content = apply_filters('the_content', $content);
                echo $content; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <?php
  $spells = get_post_meta($id, 'repeatable_fields', true);
  if (!empty($spells)) {  ?>

    <div data-component="collapse"> <!-- spells -->
      <a href="#spells" class="collapse-toggle"><h3>Spells</h3></a>
      <div class="collapse-box hide panel lighter flat" id="spells"> <?php
        $spells = get_post_meta($id, 'repeatable_fields', true);

        $level_1 = get_post_meta($id, 'level_1', true);
        $level_2 = get_post_meta($id, 'level_2', true);
        $total_level = $level_1 + $level_2; ?>
          <button id="clear-spells">Clear Spell Stats</button>
          <div class="spell-levels row gutters around"> <?php
            $slots = array(
              1 => array(2),
              2 => array(3,1),
              3 => array(4,2,1),
              4 => array(5,3,2,1),
              5 => array(6,4,3,2,1),
              6 => array(7,5,4,3,2,1),
              7 => array(7,6,5,4,3,2,1),
              8 => array(7,7,6,5,4,3,2,1),
              9 => array(7,7,7,6,5,4,3,2,1),
              10 => array(7,7,7,7,6,5,4,3,1),
              11 => array(7,7,7,7,7,6,5,4,1),
              12 => array(7,7,7,7,7,7,6,5,1),
              13 => array(7,7,7,7,7,7,7,6,1),
              14 => array(7,7,7,7,7,7,7,7,1),
              18 => array(7,7,7,7,7,7,7,7,2),
            );
            $slot_level = 1;
            foreach ($slots[min($total_level, 14)] as $slot_count) { ?>
              <div class="slot" id="slot-<?=$slot_level?>">
                <label>Level <?=$slot_level?></label>
                <button id="add-<?=$slot_level?>"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                <input class="slots" id="remain-<?=$slot_level?>" type="text" value="<?=$slot_count?>" min="0" max="<?=$slot_count?>"/>
                <button id="subtract-<?=$slot_level?>"><i class="fa fa-minus-circle" aria-hidden="true"></i></button>
              </div> <?php
              $slot_level++;
            } ?>
          </div>
          <div class="character-spells"> <?php
            for($level = 0; $level <= $total_level; $level++) { ?>
              <h3><?=($level==0?'Cantrips':"Level $level")?></h3>
              <div class="spell-list row gutters"> <?php
                foreach($spells as $spell) {
                  if ($spell['level'] == $level) {
                    $obj = get_post($spell['spell']); ?>
                    <div class="spell-block">
                      <button data-component="modal" data-target="#spell-<?=$spell['spell']?>"><?=get_the_title($spell['spell'])?></button><input type="checkbox" name="readied-spells" value="<?=$spell['spell']?>"/>
                    </div>
                    <div id="spell-<?=$spell['spell']?>" class="modal-box hide">
                      <div class="modal">
                        <span class="close"></span>
                        <div class="modal-header"><?=get_the_title($spell['spell'])?></div>
                        <div class="modal-body"> <?php
                          $desc = get_post_meta($spell['spell'], 'description', true);
                          $dice = get_post_meta($spell['spell'], 'dice-stats', true);
                          $range = get_post_meta($spell['spell'], 'range', true);
                          $duration = get_post_meta($spell['spell'], 'duration', true);
                          $target = get_post_meta($spell['spell'], 'target', true);

                          if (!empty($desc)) { ?>
                            <h4>Description</h4>
                            <p><?=$desc?></p><?php
                          }
                          if (!empty($dice)) { ?>
                            <h5>Dice Stats</h5>
                            <p><?=$dice?></p><?php
                          }
                          if (!empty($range)) { ?>
                            <h5>Spell Range</h5>
                            <p><?=$range?></p><?php
                          }
                          if (!empty($duration)) { ?>
                            <h5>Duration</h5>
                            <p><?=$duration?></p><?php
                          }
                          if (!empty($target)) { ?>
                            <h5>Target</h5>
                            <p><?=$target?></p><?php
                          } ?>
                        </div>
                      </div>
                    </div> <?php
                  }
                } ?>
              </div> <?php
            } ?>
          </div>
      </div>
    </div> <?php
  } ?>
</div>
