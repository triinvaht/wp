<?php
if ( ! defined( 'ABSPATH' ) ) exit;
class CF_WB_Admin_feedback_class {

	function __construct(){

		$this->_init();
		$this->_hooks();
		$this->_filters();

	}

	function _init(){
		global $pagenow;
		if ( 'plugins.php' === $pagenow ) {
			add_action( 'admin_enqueue_scripts', array( $this, 'feedback_load_scripts' ) );
			add_action( 'admin_footer', array( $this, 'deactivation_feedback_form' ) );
		}
	}

	function _hooks(){

		add_action( 'wp_ajax_mscf_send_user_feedback', array( $this, 'mscf_send_user_feedback' ) );
		
	}

	function _filters(){

	}


	function feedback_load_scripts() {
		wp_enqueue_style( 'wp-jquery-ui-dialog' );
		wp_enqueue_script( 'MSFM_Send_feedback',SMUZFORM_PLUGIN_URL.'/admin/assets/js/get-feedback.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-dialog' ), false, true );
		wp_localize_script( 'MSFM_Send_feedback', 'CFWBS_feedback_URL',array( 'admin_ajax' => admin_url( 'admin-ajax.php' ) ) );
	}


	function deactivation_feedback_form() {
		
			$pb_current_user = wp_get_current_user(); 
		?>
		<div id="MSFCF_feedback_form_container" style="display: none;">
			<p>
				<b>It is really sad to see you leaving me. 😢 <br>
				I would love to get a small feedback from you. </b>
			</p>
			<form>
				<?php wp_nonce_field(); ?>
				<ul id="MSFCF-deactivate-reasons">

					<li class="MSFCF-reason">
						<label>
							<span><input value="Plugin is not good" type="radio" name="reason" checked="checked" /></span>
							<span>Plugin is not good</span>
						</label>					
					</li>
					<li class="MSFCF-reason">
						<label>
							<span><input value="bad support" type="radio" name="reason" /></span>
							<span>Bad Support</span>
						</label>					
					</li>				
					<li class="MSFCF-reason MSFCF-custom-input">
						<label>
							<span><input value="Found a better plugin" type="radio" name="reason" /></span>
							<span>Found a better plugin</span>
						</label>				
					</li>
					<li class="MSFCF-reason MSFCF-custom-input">
						<label>
							<span><input value="The plugin didn't work" type="radio" name="reason" /></span>
							<span>The plugin didn't work</span>
						</label>					
					</li>					
					<li class="MSFCF-reason MSFCF-custom-input">
						<label>
							<span><input value="Other Reason" type="radio" name="reason" /></span>
							<span>Other Reason</span>
						</label>
					</li>
					<li class="MSFCF-reason MSFCF-support-input">
						<label>
							<span><input value="Support Ticket" type="radio" name="reason" /></span>
							<span>Open A support ticket for me</span>
						</label>
						<div class="MSFCF-reason-input" style="display: none;">
							<input type="email" name="support[email]" placeholder="Your Email Address" required>
							<input type="text" name="support[title]" placeholder="The Title" required>
							<textarea name="support[text]" placeholder="Describe the issue" required></textarea>
						</div>
					</li>
					<li class="MSFCF-reason">
						<label>
							<span><input type="checkbox" value="<?php echo($pb_current_user->user_email) ?>" name="followUpEmail"  checked /></span>
							<span>Share your email address. (We can get in touch with you to fix this)</span>
						</label>
					</li>																			
				</ul>
				<div class="MSFCF-reason-input" style="display: none;">
					<input type="text" class="regular-text" name="other_input" placeholder="Do you mind help and give more detailes?">
				</div>				
			</form>
		</div>
		<style type="text/css">
			.MSFCF_feedback_form_form .ui-dialog-buttonset {
				float: none !important;
			}

			#MSFCF_feedback_form_go {
				float: left;
			}

			#MSFCF_feedback_form_skip, #MSFCF_feedback_form_cancel {
				float: right;
			}

			#MSFCF_feedback_form_container p {
				font-size: 1.1em;
			}

			.MSFCF-reason-input textarea {
				margin-top: 10px;
				width: 100%;
				height: 150px;
			}

			.MSFCF_feedback_form_form .ui-icon {
				display: none;
			}

			#MSFCF_feedback_form_go.MSFCF-ajax-progress .ui-icon {
				text-indent: inherit;
				display: inline-block !important;
				vertical-align: middle;
				animation: rotate 2s infinite linear;
			}

			#MSFCF_feedback_form_go.MSFCF-ajax-progress .ui-button-text {
				vertical-align: middle;
			}			

			@keyframes rotate {
			  0%    { transform: rotate(0deg); }
			  100%  { transform: rotate(360deg); }
			}			
		</style>
	<?php
	}


	function mscf_send_user_feedback(){

	if ( ! check_ajax_referer() ) {
		die( 'security error' );
	}

	$other_input = '';
	if (isset($_POST['other_input']) ) {
		$other_input = sanitize_text_field( $_POST['other_input']);
	}
	$postedFeedbackReason = sanitize_text_field( $_POST['reason'] ) . "  :  ". $other_input."\n";

	if (isset($_POST['followUpEmail'])) {
		$followUpEmail  = sanitize_text_field($_POST['followUpEmail']);
		$postedFeedbackReason = $postedFeedbackReason."\n".$followUpEmail;
	}

	$emailContents = $postedFeedbackReason;
	if ( isset( $_POST['support'] ) ) {
		$postedFeedbackSupportEmail = sanitize_email( $_POST['support']['email'] );
		$postedFeedbackSupportTitle = sanitize_text_field( $_POST['support']['title'] );
		$postedFeedbackSupportMessage = sanitize_textarea_field( $_POST['support']['text'] );

		$emailContents = "Support Email : $postedFeedbackSupportEmail \n". 
						 "Support Title : $postedFeedbackSupportTitle \n".
						 "Support Message : $postedFeedbackSupportMessage \n";
	}

			$fromEmailAddress = home_url();
			$fromEmailAddress = trim($fromEmailAddress, '/');

			if (!preg_match('#^http(s)?://#', $fromEmailAddress)) {
			    $fromEmailAddress = 'http://' . $fromEmailAddress;
			}

			$urlParts = parse_url($fromEmailAddress);

			$OnlyDomain = preg_replace('/^www\./', '', $urlParts['host']);

			$fromEmailAddress =  "pluginopsfeedbackform@".$OnlyDomain;

			
			$headers[]= "From: "." Contact Form Feedback Form"." <".$fromEmailAddress.">";


	$sendFeedback =  wp_mail( 'feedback@pluginops.com', "CF Uninstall FeedBack", $emailContents, $headers);

	if ($sendFeedback  == true) {
		echo "success";
	}
	exit();

}


} //class ends

?>