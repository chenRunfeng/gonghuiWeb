<?php

/**
  Category Template:
 **/



class Custom_Category_Templates {

	var $template;

	function __construct() {
		if( is_admin() ) {
			add_action( 'category_add_form_fields', array( &$this, 'add_template_option') );
			add_action( 'category_edit_form_fields', array( &$this, 'edit_template_option') );
			add_action( 'created_category', array( &$this, 'save_option' ), 10, 2 );
			add_action( 'edited_category', array( &$this, 'save_option' ), 10, 2 );
			add_action( 'delete_category', array( &$this, 'delete_option' ) );
		} else {
			add_filter( 'category_template', array( &$this, 'category_template' ) );
		}
	}

	function category_template( $template ) {
		$category_templates = get_option( 'category_templates', array() );
		$category = get_queried_object();
		$id = $category->term_id;
		$tmpl = locate_template( $category_templates[$id] );
		if( isset( $category_templates[$id] ) && 'default' !== $category_templates[$id] && '' !== $tmpl ) {
			$this->template = $category_templates[$id];
			add_filter( 'body_class', array( &$this, 'body_class' ) );
			return $tmpl;
		}
		return $template;
	}

	function body_class( $classes ) {
		$template = sanitize_html_class( str_replace( '.', '-', $this->template ) );
		$classes[] = 'category-template-' . $template;
		return $classes;
	}

	function save_option( $term_id ) {
		if( isset( $_POST['template'] ) ) {
			$template = trim( $_POST['template'] );
			$category_templates = get_option( 'category_templates', array() );
			if( 'default' == $template ) {
				unset( $category_templates[$term_id] );
			} else {
				$category_templates[$term_id] = $template;
			}
			update_option( 'category_templates', $category_templates );
		}
	}

	function add_template_option() { ?>
		<div class="form-field">
			<label for="template">分类目录模版选择</label>
			<select name="template" id="template" class="postform">
				<option value='default'><?php _e('Default Template'); ?></option>
				<?php $this->category_templates_dropdown() ?>
			</select>
		<p class="description">选择分类目录模版，如果您不知道分类目录模版的样式，请去<a href="http://www.themepark.com.cn/">WEB主题公园官网</a>查看说明，并可以以官网演示主题了解。</p>
            
		</div>
	<?php }

	function edit_template_option() {
		$id = $_REQUEST['tag_ID'];
		$templates = get_option( 'category_templates' );
		$template = $templates[$id];
		?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="template">分类目录模版选择</label>
			</th>
			<td>
				<select name="template" id="template" class="postform">
					<option value='default'><?php _e('Default Template'); ?></option>
					<?php $this->category_templates_dropdown( $template ) ?>
				</select>
					<p class="description">选择分类目录模版，如果您不知道分类目录模版的样式，请去<a href="http://www.themepark.com.cn/">WEB主题公园官网</a>查看说明，并可以以官网演示主题了解。</p>
			</td>
		</tr>

	<?php }

	function delete_option( $term_id ) {
		$category_templates = get_option( 'category_templates', array() );
		if( isset( $category_templates[$term_id] ) ) {
			unset( $category_templates[$term_id] );
			update_option( 'category_templates', $category_templates );
		}
	}

	/**
	 * Generate the options for the category templates list
	 *
	 * @since 0.1
	 * @return void
	 */
	function category_templates_dropdown( $default = null ) {
		$templates = array_flip( $this->get_category_templates() );
		ksort( $templates );
		foreach( array_keys( $templates ) as $template )
			: if ( $default == $templates[$template] )
				$selected = " selected='selected'";
			else
				$selected = '';
		echo "\n\t<option value='".$templates[$template]."' $selected>$template</option>";
		endforeach;
	}

	/**
	 * Get a list of Category Templates available in the current theme
	 *
	 * @since 0.1
	 * @return array Key is the template name, value is the filename of the template
	 */
	function get_category_templates( $template = null ) {
		$category_templates = array();
		$theme = wp_get_theme( $template );
		$files = (array) $theme->get_files( 'php', 1 );

		foreach ( $files as $file => $full_path ) {
			if ( ! preg_match( '|Category Template:(.*)$|mi', file_get_contents( $full_path ), $header ) )
				continue;
			$category_templates[ $file ] = _cleanup_header_comment( $header[1] );
		}

		if ( $theme->parent() )
			$category_templates += $this->get_category_templates( $theme->get_template() );

		return $category_templates;
	}
}
$custom_category_templates = new Custom_Category_Templates();