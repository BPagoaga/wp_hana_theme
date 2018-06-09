<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices(); ?>

<div class="row">
	<div class="col s12 m6 offset-m3">
		<div class="card">
			<div class="card-content center-align">

				<!-- login form -->
				<form class="woocommerce-ResetPassword lost_reset_password" method="post">
				<h2 class="card-title"><?php esc_html_e( 'Mot de passe oublié ?', 'woocommerce' ); ?></h2>
				<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

				<div class="input-field col s12 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<input id="user_login" type="text" class="validate woocommerce-Input woocommerce-Input--text input-text" name="user_login">
					<label for="user_login"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?></label>
				</div>

				<?php do_action( 'woocommerce_lostpassword_form' ); ?>
				<div class="card-action">
					<input type="hidden" name="wc_reset_password" value="true" />
					<button class="btn waves-effect waves-light woocommerce-Button button" type="submit" name="register" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>"><?php esc_html_e( 'Reset password', 'woocommerce' ); ?></button>
				</div>

				<?php wp_nonce_field( 'lost_password' ); ?>

				</form>
			</div>
		</div>
	</div>
</div>
