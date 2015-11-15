<?php/***Author: Ashuwp*Author url: http://www.ashuwp.com*Version: 3.2**/class ashu_taxonomy_feild{  var $ashu_feild;  var $taxonomy_conf;    function ashu_taxonomy_feild($ashu_feild,$taxonomy_conf){    $this->ashu_feild = $ashu_feild;    $this->taxonomy_conf = $taxonomy_conf;        foreach($this->taxonomy_conf as $taxonomy){      add_action($taxonomy.'_add_form_fields', array(&$this, 'taxonomy_fields_adds'), 10, 2);      add_action($taxonomy.'_edit_form_fields', array(&$this, 'taxonomy_metabox_edit'), 10, 2);      add_action('created_'.$taxonomy, array(&$this, 'save_taxonomy_metadata'), 10, 1);      add_action('edited_'.$taxonomy,array(&$this, 'save_taxonomy_metadata'), 10, 1);      add_action('admin_menu', array(&$this, 'init_taxonomy'));      add_action('delete_'.$taxonomy, array(&$this,'delete_taxonomy_metadata'),10,1);    }  }    function init_taxonomy(){    if(basename( $_SERVER['PHP_SELF']) == "edit-tags.php") {      wp_enqueue_media();      wp_enqueue_style('metabox_fields_css', get_template_directory_uri(). '/styles/metabox_fields.css');      wp_enqueue_script('metabox_fields_js',get_template_directory_uri(). '/Scripts/metabox_fields.js');    }  }    function taxonomy_fields_adds($tag){    foreach($this->ashu_feild as $ashu_feild){      if( !isset($ashu_feild["edit_only"]) || !$ashu_feild["edit_only"] ){        if (method_exists($this, $ashu_feild['type'])){          echo '<div class="form-field">';          echo '<label for="'.$ashu_feild['id'].'" >'.$ashu_feild['name'].'</label>';          $this->$ashu_feild['type']($ashu_feild);          echo '</div>';        }      }    }  }    function taxonomy_metabox_edit($tag){    foreach($this->ashu_feild as $ashu_feild){      if (method_exists($this, $ashu_feild['type'])){              if(get_term_meta($tag->term_id , $ashu_feild['id']) !== ""){        $ashu_feild['std'] = get_term_meta($tag->term_id, $ashu_feild['id'], true);      }            echo '<tr class="form-field">';      echo '<th scope="row" valign="top">';      echo '<label for="'.$ashu_feild['id'].'" >'.$ashu_feild['name'].'</label>';      echo '</th>';      echo '<td>';      $this->$ashu_feild['type']($ashu_feild);      echo '</td>';      echo '</tr>';      }    }  }    function delete_taxonomy_metadata($term_id){    foreach($this->ashu_feild as $ashu_feild){      delete_term_meta($term_id,$ashu_feild['id']);    }  }    function save_taxonomy_metadata($term_id){    foreach($this->ashu_feild as $ashu_feild){      if(isset($_POST[$ashu_feild['id']])){        if(!current_user_can('manage_categories')){          return $term_id ;        }              if( $ashu_feild['type'] == 'tinymce' ){          $data =  stripslashes($_POST[$ashu_feild['id']]);        }elseif( $ashu_feild['type'] == 'checkbox' ){          $data =  $_POST[$ashu_feild['id']];        }elseif( $ashu_feild['type'] == 'numbers_array' ){          $data = explode( ',', $_POST[$ashu_feild['id']] );          $data = array_filter($data);        }elseif( $ashu_feild['type'] == 'gallery' ){          $data = explode( ',', $_POST[$ashu_feild['id']] );          $data = array_filter($data);        }else{          $data = htmlspecialchars($_POST[$ashu_feild['id']], ENT_QUOTES,"UTF-8");        }                if(get_term_meta($term_id , $ashu_feild['id']) == "")          add_term_meta($term_id , $ashu_feild['id'], $data, true);        elseif($data != get_term_meta($term_id , $ashu_feild['id'], true))          update_term_meta($term_id , $ashu_feild['id'], $data);        elseif($data == "")          delete_term_meta($term_id , $ashu_feild['id'], get_term_meta($term_id , $ashu_feild['id'], true));      }    }  }    function title($option){    echo '<h3>'.$option['desc'].'</h3>';  }    function text($option){    echo '<input type="text" size="'.$option['size'].'" value="';    echo $option['std'];    echo '" id="'.$option['id'].'" name="'.$option['id'].'"/>';    echo '<p>'.$option['desc'].'</p>';  }    function password($option){    echo '<input type="password" size="'.$option['size'].'" value="';    echo $option['std'];    echo '" id="'.$option['id'].'" name="'.$option['id'].'"/>';    echo '<p>'.$option['desc'].'</p>';  }  function textarea($option){    if(!isset($option['size'])){      $option['size'] = array(60,5);    }    echo '<textarea cols="'.$option['size'][0].'" rows="'.$option['size'][1].'" id="'.$option['id'].'" name="'.$option['id'].'">'.$option['std'].'</textarea>';    echo '<p>'.$option['desc'].'</p>';  }    function upload($option){    $file_view = '';        if($option['std'] != ''){      $file_type = substr($option['std'], strrpos($option['std'] , '.') + 1);      if(in_array($file_type,array('png','jpg','gif','bmp'))){        $file_view = '<img src="'.$option['std'].'" />';      }else{        $file_view = '<img src="'.includes_url().'/images/media/default.png" />';      }    }        $button_text = (isset($option['button_text'])) ? $option['button_text'] : 'Upload';    echo '<div id="'.$option['id'].'_div" class="ashu_file_view">'.$file_view .'</div>';    echo $option['desc'].'<br/>';    echo '<input class="ashuwp_url_input" type="text" id="'.$option['id'].'_input" size="'.$option['size'].'" value="'.$option['std'].'" name="'.$option['id'].'"/><a href="#" id="'.$option['id'].'" class="ashu_upload_button button">'.$button_text.'</a>';  }    function gallery($option){      $button_text = (isset($option['button_text'])) ? $option['button_text'] : 'Upload';        if($option['std'] != ''){      $image_ids = implode( ',', $option['std'] );    }else{      $image_ids = '';    }        echo '<div class="gallery_container"><ul class="gallery_view">';    if ( $option['std'] )      foreach ( $option['std'] as $attachment_id ) {        echo '<li class="image" data-attachment_id="' . $attachment_id . '">' . wp_get_attachment_image( $attachment_id, 'thumbnail' ) . '<ul class="actions"><li><a href="#" class="delete" title="Delete image">Delete</a></li></ul></li>';      }    echo '</ul><div class="clear"></div>';    echo '<input type="hidden" id="'.$option['id'].'_input" class="gallery_input" name="'.$option['id'].'" value="'.$image_ids.'" />';    echo '<a href="#" class="add_gallery button">'.$button_text.'</a>';    echo '</div>';  }    function radio( $option ){    foreach( $option['buttons'] as $key=>$value ) {      $checked ="";      if( $option['std'] == $key) {        $checked = 'checked = "checked"';      }      echo '<input '.$checked.' type="radio" class="ashu_radio" value="'.$key.'" name="'.$option['id'].'"/>'.$value;    }  }    function checkbox($option) {    foreach( $option['buttons'] as $key=>$value ) {      $checked ="";      if( is_array($option['std']) && in_array($key,$option['std'])) {        $checked = 'checked = "checked"';      }      echo '<input '.$checked.' type="checkbox" class="ashu_checkbox" value="'.$key.'" name="'.$option['id'].'[]"/>'.$value;    }  }    function dropdown($option){    if($option['subtype'] == 'page') {      $select = 'Select page';      $entries = get_pages('title_li=&orderby=name');    }else if($option['subtype'] == 'sidebar'){      global $wp_registered_sidebars;      $select = 'Select a special sidebar';      $entries = $wp_registered_sidebars;    }else if($option['subtype'] == 'category'){      $select = 'Select category';      $entries = get_terms('category',array('hide_empty' => false));    }else if($option['subtype'] == 'menu'){      $select = 'Select...';      $entries = get_terms( 'nav_menu', array( 'hide_empty' => false ) );    }else{      $select = 'Select...';      $entries = $option['subtype'];    }        echo '<select class="postform" id="'. $option['id'] .'" name="'. $option['id'] .'"> ';    echo '<option value="">select...</option>  ';        foreach ($entries as $key => $entry){      if($option['subtype'] == 'page'){        $id = $entry->ID;        $title = $entry->post_title;      }else if($option['subtype'] == 'category'){        $id = $entry->term_id;        $title = $entry->name;      }else if($option['subtype'] == 'menu'){        $id = $entry->term_id;        $title = $entry->name;      }else if($option['subtype'] == 'sidebar'){        $id = $entry['id'];        $title = $entry['name'];      }else{        $id = $key;        $title = $entry;      }            $selected='';            if( $option['std'] == $id ){        $selected = "selected='selected'";      }      echo"<option $selected value='". $id ."'>". $title."</option>";    }    echo '</select>';    echo '<p>'.$option['desc'].'</p>';  }    function numbers_array($option){    if($option['std']!='')      $nums = implode( ',', $option['std'] );    else      $nums = '';        if($option['desc'] != "")      echo '<p>'.$option['desc'].'</p>';    echo '<input type="text" size="'.$option['size'].'" value="'.$nums.'" id="'.$option['id'].'" name="'.$option['id'].'"/>';  }    function tinymce($option){    $tinymce_args = array(      'content_css' => get_stylesheet_directory_uri() . '/css/editor-'.$option['id'].'.css'    );	    if( isset($option['media']) && !$option['media'] )      $option['media'] = 0;    else      $option['media'] = 1;	      wp_editor( $option['std'],$option['id'],$settings=array('tinymce'=>$option['media'],'media_buttons'=>1,'tinymce'=>$tinymce_args) );  }}?>