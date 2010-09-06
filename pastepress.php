<?php
/**
 * @package PastePress
 * @version 
 */
/*
Plugin Name: Paste-Press
Plugin URI: http://pastepress.org
Description: Pastebin clone.
Author: Simon Prosser
Version: 0.1
Author URI: http://pross.org.uk
*/
add_action( 'widgets_init', 'pp_widget' );

add_filter( 'the_content', 'pp_content' );

add_shortcode('pastepress', 'pastepress_init');

//add_filter( 'wp_insert_post_data' , 'pp_post_filter' , '99' );

add_action('init', 'pp_init');



function pp_init() {

remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');



}



function pastepress_init() {

if ($_POST['paste']) _insert_paste();


echo pp_form();

}

function pp_form($paste) {

$pp_form = '<form action="' . get_option('siteurl') . '" method="post"><textarea cols="60" rows="8" name="paste"> ' . $paste . '</textarea>';
$pp_form .= '<br /><input type="submit" />';

$pp_form .= '<select name="lang">
	<option value="4cs">GADV 4CS</option>
	<option value="6502acme">MOS 6502 (6510) ACME Cross Assembler format</option>
	<option value="6502kickass">MOS 6502 (6510) Kick Assembler format</option>
	<option value="6502tasm">MOS 6502 (6510) TASM/64TASS 1.46 Assembler format</option>
	<option value="68000devpac">Motorola 68000 - HiSoft Devpac ST 2 Assembler format</option>
	<option value="abap">ABAP</option>
	<option value="actionscript">ActionScript</option>
	<option value="actionscript3">ActionScript 3</option>
	<option value="ada">Ada</option>
	<option value="algol68">ALGOL 68</option>
	<option value="apache">Apache configuration</option>
	<option value="applescript">AppleScript</option>
	<option value="apt_sources">Apt sources</option>
	<option value="asm">ASM</option>
	<option value="asp">ASP</option>
	<option value="autoconf">Autoconf</option>
	<option value="autohotkey">Autohotkey</option>
	<option value="autoit">AutoIt</option>
	<option value="avisynth">AviSynth</option>
	<option value="awk">awk</option>
	<option value="bash">Bash</option>
	<option value="basic4gl">Basic4GL</option>
	<option value="bf">Brainfuck</option>
	<option value="bibtex">BibTeX</option>
	<option value="blitzbasic">BlitzBasic</option>
	<option value="bnf">bnf</option>
	<option value="boo">Boo</option>
	<option value="c">C</option>
	<option value="c_loadrunner">C (LoadRunner)</option>
	<option value="c_mac">C (Mac)</option>
	<option value="caddcl">CAD DCL</option>
	<option value="cadlisp">CAD Lisp</option>
	<option value="cfdg">CFDG</option>
	<option value="cfm">ColdFusion</option>
	<option value="chaiscript">ChaiScript</option>
	<option value="cil">CIL</option>
	<option value="clojure">Clojure</option>
	<option value="cmake">CMake</option>
	<option value="cobol">COBOL</option>
	<option value="cpp">C++</option>
	<option value="cpp-qt" class="sublang">&nbsp;&nbsp;C++ (QT)</option>
	<option value="csharp">C#</option>
	<option value="css">CSS</option>
	<option value="cuesheet">Cuesheet</option>
	<option value="d">D</option>
	<option value="dcs">DCS</option>
	<option value="delphi">Delphi</option>
	<option value="diff">Diff</option>
	<option value="div">DIV</option>
	<option value="dos">DOS</option>
	<option value="dot">dot</option>
	<option value="e">E</option>
	<option value="ecmascript">ECMAScript</option>
	<option value="eiffel">Eiffel</option>
	<option value="email">eMail (mbox)</option>
	<option value="epc">EPC</option>
	<option value="erlang">Erlang</option>
	<option value="f1">Formula One</option>
	<option value="falcon">Falcon</option>
	<option value="fo">FO (abas-ERP)</option>
	<option value="fortran">Fortran</option>
	<option value="freebasic">FreeBasic</option>
	<option value="fsharp">F#</option>
	<option value="gambas">GAMBAS</option>
	<option value="gdb">GDB</option>
	<option value="genero">genero</option>
	<option value="genie">Genie</option>
	<option value="gettext">GNU Gettext</option>
	<option value="glsl">glSlang</option>
	<option value="gml">GML</option>
	<option value="gnuplot">Gnuplot</option>
	<option value="go">Go</option>
	<option value="groovy">Groovy</option>
	<option value="gwbasic">GwBasic</option>
	<option value="haskell">Haskell</option>
	<option value="hicest">HicEst</option>
	<option value="hq9plus">HQ9+</option>
	<option value="html4strict">HTML</option>
	<option value="icon">Icon</option>
	<option value="idl">Uno Idl</option>
	<option value="ini">INI</option>
	<option value="inno">Inno</option>
	<option value="intercal">INTERCAL</option>
	<option value="io">Io</option>
	<option value="j">J</option>
	<option value="java">Java</option>
	<option value="java5">Java(TM) 2 Platform Standard Edition 5.0</option>
	<option value="javascript">Javascript</option>
	<option value="jquery">jQuery</option>
	<option value="kixtart">KiXtart</option>
	<option value="klonec">KLone C</option>
	<option value="klonecpp">KLone C++</option>
	<option value="latex">LaTeX</option>
	<option value="lb">Liberty BASIC</option>
	<option value="lisp">Lisp</option>
	<option value="locobasic">Locomotive Basic</option>
	<option value="logtalk">Logtalk</option>
	<option value="lolcode">LOLcode</option>
	<option value="lotusformulas">Lotus Notes @Formulas</option>
	<option value="lotusscript">LotusScript</option>
	<option value="lscript">LScript</option>
	<option value="lsl2">LSL2</option>
	<option value="lua">Lua</option>
	<option value="m68k">Motorola 68000 Assembler</option>
	<option value="magiksf">MagikSF</option>
	<option value="make">GNU make</option>
	<option value="mapbasic">MapBasic</option>
	<option value="matlab">Matlab M</option>
	<option value="mirc">mIRC Scripting</option>
	<option value="mmix">MMIX</option>
	<option value="modula2">Modula-2</option>
	<option value="modula3">Modula-3</option>
	<option value="mpasm">Microchip Assembler</option>
	<option value="mxml">MXML</option>
	<option value="mysql">MySQL</option>
	<option value="newlisp">newlisp</option>
	<option value="nsis">NSIS</option>
	<option value="oberon2">Oberon-2</option>
	<option value="objc">Objective-C</option>
	<option value="objeck">Objeck Programming Language</option>
	<option value="ocaml">OCaml</option>
	<option value="ocaml-brief" class="sublang">&nbsp;&nbsp;OCaml (brief)</option>
	<option value="oobas">OpenOffice.org Basic</option>
	<option value="oracle11">Oracle 11 SQL</option>
	<option value="oracle8">Oracle 8 SQL</option>
	<option value="oxygene">Oxygene (Delphi Prism)</option>
	<option value="oz">OZ</option>
	<option value="pascal">Pascal</option>
	<option value="pcre">PCRE</option>
	<option value="per">per</option>
	<option value="perl">Perl</option>
	<option value="perl6">Perl 6</option>
	<option value="pf">OpenBSD Packet Filter</option>
	<option value="php" selected="selected">PHP</option>
	<option value="php-brief" class="sublang">&nbsp;&nbsp;PHP (brief)</option>
	<option value="pic16">PIC16</option>
	<option value="pike">Pike</option>
	<option value="pixelbender">Pixel Bender 1.0</option>
	<option value="plsql">PL/SQL</option>
	<option value="postgresql">PostgreSQL</option>
	<option value="povray">POVRAY</option>
	<option value="powerbuilder">PowerBuilder</option>
	<option value="powershell">PowerShell</option>
	<option value="progress">Progress</option>
	<option value="prolog">Prolog</option>
	<option value="properties">PROPERTIES</option>
	<option value="providex">ProvideX</option>
	<option value="purebasic">PureBasic</option>
	<option value="python">Python</option>
	<option value="q">q/kdb+</option>
	<option value="qbasic">QBasic/QuickBASIC</option>
	<option value="rails">Rails</option>
	<option value="rebol">REBOL</option>
	<option value="reg">Microsoft Registry</option>
	<option value="robots">robots.txt</option>
	<option value="rpmspec">RPM Specification File</option>
	<option value="rsplus">R / S+</option>
	<option value="ruby">Ruby</option>
	<option value="sas">SAS</option>
	<option value="scala">Scala</option>
	<option value="scheme">Scheme</option>
	<option value="scilab">SciLab</option>
	<option value="sdlbasic">sdlBasic</option>
	<option value="smalltalk">Smalltalk</option>
	<option value="smarty">Smarty</option>
	<option value="sql">SQL</option>
	<option value="systemverilog">SystemVerilog</option>
	<option value="tcl">TCL</option>
	<option value="teraterm">Tera Term Macro</option>
	<option value="text">Text</option>
	<option value="thinbasic">thinBasic</option>
	<option value="tsql">T-SQL</option>
	<option value="typoscript">TypoScript</option>
	<option value="unicon">Unicon (Unified Extended Dialect of Icon)</option>
	<option value="vala">Vala</option>
	<option value="vb">Visual Basic</option>
	<option value="vbnet">vb.net</option>
	<option value="verilog">Verilog</option>
	<option value="vhdl">VHDL</option>
	<option value="vim">Vim Script</option>
	<option value="visualfoxpro">Visual Fox Pro</option>
	<option value="visualprolog">Visual Prolog</option>
	<option value="whitespace">Whitespace</option>
	<option value="whois">Whois (RPSL format)</option>
	<option value="winbatch">Winbatch</option>
	<option value="xbasic">XBasic</option>
	<option value="xml">XML</option>
	<option value="xorg_conf">Xorg configuration</option>
	<option value="xpp">X++</option>
	<option value="z80">ZiLOG Z80 Assembler</option>
	<option value="zxbasic">ZXBasic</option>
</select>';

$pp_form .= '</form>';

return $pp_form;


}



function _insert_paste() {
$paste = $_POST['paste'];

// Create post object
  $my_post = array();
  $my_post['post_content'] = $paste;
  $my_post['post_status'] = 'publish';
$my_post['post_type'] = 'paste';
$my_post['filter'] = true;
$my_post['comment_status'] = 'closed';
$my_post['ping_status'] = 'closed';

// Insert the post into the database
 $post_id =  wp_insert_post( $my_post );

//$post_id = wp_insert_post('post_content' => $paste );

if ($post_id > 0) {
add_post_meta( $post_id, 'type', $_POST['lang'], true);

wp_redirect(get_option('siteurl') . '/' . $post_id);

}

}


function _register_type() {
register_post_type('paste', array(
	'label' => __('Paste'),
	'singular_label' => __('paste'),
	'public' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => false,
	'show_ui' => true,
	'capability_type' => 'post',
	'hierarchical' => false,
	'rewrite' => array("slug" => "pastes"),
	'query_var' => false,
	'supports' => array( 'title' )
));
}
add_action('init','_register_type');



 


add_filter( 'pre_get_posts', 'my_get_posts' );



function my_get_posts( $query ) {
	if ( is_home() || is_feed() )
		$query->set( 'post_type', array( 'post', 'page', 'paste', 'quote', 'attachment' ) );
	return $query;
}

function pp_widget() {

	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );

	

/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class pp_WP_Widget_Recent_Posts extends WP_Widget {

	function pp_WP_Widget_Recent_Posts() {
		$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent pastes on your site") );
		$this->WP_Widget('recent-posts', __('Recent Pastes'), $widget_ops);
		$this->alt_option_name = 'widget_recent_entries';

		add_action( 'save_post', array(&$this, 'flush_widget_cache') );
		add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
		add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
	}

	function widget($args, $instance) {
		$cache = wp_cache_get('widget_recent_pastes', 'widget');

		if ( !is_array($cache) )
			$cache = array();

		if ( isset($cache[$args['widget_id']]) ) {
			echo $cache[$args['widget_id']];
			return;
		}

		ob_start();
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Pastes') : $instance['title'], $instance, $this->id_base);
		if ( !$number = (int) $instance['number'] )
			$number = 10;
		else if ( $number < 1 )
			$number = 1;
		else if ( $number > 15 )
			$number = 15;

		$r = new WP_Query(array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1, 'post_type' => 'paste'));
		if ($r->have_posts()) :
?>
		<?php echo $before_widget; ?>
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		<ul>
		<?php  while ($r->have_posts()) : $r->the_post(); ?>
		<li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></li>
		<?php endwhile; ?>
		</ul>
		<?php echo $after_widget; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		$cache[$args['widget_id']] = ob_get_flush();
		wp_cache_set('widget_recent_pastes', $cache, 'widget');
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete('widget_recent_pastes', 'widget');
	}

	function form( $instance ) {
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
			$number = 5;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
		<input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
<?php
	}
}

register_widget('pp_WP_Widget_Recent_Posts');
}






function pp_content( $content ) {
global $post;

$pp = get_post_meta($post->ID, 'type');

if ($pp):

include('geshi.php');

$geshi = new GeSHi($content, $pp[0]);
$geshi->enable_classes();


$geshi->set_overall_class('code');
echo '<style>' . $geshi->get_stylesheet(true) . '</style>';
$geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS, 1);
$geshi->enable_strict_mode(GESHI_MAYBE);
$geshi->set_header_type(GESHI_HEADER_DIV);



$pp_content = $geshi->parse_code();

$pp_content .= pp_form($content); 


return $pp_content;

else:
return $content;
endif;

}
