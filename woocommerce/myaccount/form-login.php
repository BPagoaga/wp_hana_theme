<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
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
	exit; // Exit if accessed directly.
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set" id="customer_login">

	<div class="u-column1 col-1">

<?php endif; ?>

		<div class="row">
			<div class="col s12 m6 offset-m3">
				<div class="card">
					<div class="card-content center-align">
						<h2 class="card-title"><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

						<!-- login form -->
						<form class="woocommerce-form woocommerce-form-login login" method="post">

							<?php do_action( 'woocommerce_login_form_start' ); ?>

							<div class="row">
								<div class="input-field col s10 offset-s1 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<i class="material-icons prefix">account_circle</i>
									<input placeholder="Addresse e-mail" id="username" type="text" class="validate woocommerce-Input woocommerce-Input--text input-text" name="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
									<label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?> <span class="required">*</span></label>
								</div>
								<div class="input-field col s10 offset-s1">
									<i class="material-icons prefix">lock_outline</i>
									<input id="password" type="password" name="password" class="validate woocommerce-Input woocommerce-Input--text input-text">
									<label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
								</div>
							</div>

							<?php do_action( 'woocommerce_login_form' ); ?>

							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
							<div class="card-action">
								<button class="btn waves-effect waves-light woocommerce-Button button" type="submit" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?>
									<i class="material-icons right">send</i>
								</button>

								<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
								<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline" for="rememberme">
									<?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
								</label>

								<p class="woocommerce-LostPassword lost_password">
									<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
								</p>
							</div>

							<?php do_action( 'woocommerce_login_form_end' ); ?>

						</form>
					</div>
				</div>
			</div>
		</div>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="u-column2 col-2">

		<div class="row">
			<div class="col s12 m6 offset-m3">
				<div class="card">
					<div class="card-content center-align">
						<h2 class="card-title"><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

						<!-- register form -->
						<form class="register" method="post">

							<?php do_action( 'woocommerce_register_form_start' ); ?>

							<div class="row">

								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

								<div class="input-field col s10 offset-s1 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<i class="material-icons prefix">account_circle</i>
									<input placeholder="Addresse e-mail" id="reg_username" type="text" class="validate woocommerce-Input woocommerce-Input--text input-text" name="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
									<label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
								</div>

								<?php endif; ?>

								<div class="input-field col s10 offset-s1 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<i class="material-icons prefix">account_circle</i>
									<input placeholder="Addresse e-mail" id="reg_email" type="email" class="validate woocommerce-Input woocommerce-Input--text input-text" name="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
									<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
								</div>

								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
								<div class="input-field col s10 offset-s1">
									<i class="material-icons prefix">lock_outline</i>
									<input id="reg_password" type="password" name="password" class="validate woocommerce-Input woocommerce-Input--text input-text">
									<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
								</div>

								<?php endif; ?>

							</div>

							<?php do_action( 'woocommerce_register_form' ); ?>

							<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
							<div class="card-action">
								<button class="btn waves-effect waves-light woocommerce-Button button" type="submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?>
									<i class="material-icons right">send</i>
								</button>

							</div>

							<?php do_action( 'woocommerce_register_form_end' ); ?>

						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
