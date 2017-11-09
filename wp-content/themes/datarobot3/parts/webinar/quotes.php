<?php
/**
 * Created by PhpStorm.
 * User: vitaly.nikolaiev
 * Date: 10/30/17
 * Time: 17:13
 */ ?>
<?php if ( have_rows( 'quotes', 'option' ) ): ?>
    <div class="quotes-slider hidden">
        <svg class="quote-icon" width="45" height="41" viewBox="0 0 45 41" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient x1="0%" y1="0%" y2="100%" id="a">
                    <stop stop-color="#2D8FE2" stop-opacity="0" offset="0%"/>
                    <stop stop-color="#2D8FE2" stop-opacity=".5" offset="100%"/>
                </linearGradient>
            </defs>
            <path d="M30 35.5894c1.4063-.3766 3-1.1063 4.7813-2.189 1.7812-1.0828 3.3984-2.3538 4.8515-3.8132 1.453-1.4593 2.6484-3.0364 3.586-4.731.9375-1.6948 1.3125-3.3896 1.125-5.0843-.1876-.3767-.7032-.612-1.547-.7062-.8437-.0942-1.6405-.1413-2.3905-.1413-2.3438 0-4.383-.7767-6.1172-2.3302-1.7343-1.5535-2.6015-3.7426-2.6015-6.567 0-2.7305.961-5.0843 2.8828-7.0615C36.4923.9886 38.672 0 41.1093 0c3.75 0 6.586 1.3652 8.508 4.0956C51.539 6.826 52.5 10.1684 52.5 14.1228c0 3.013-.6328 5.908-1.8984 8.6855-1.2657 2.7775-2.9297 5.343-4.9922 7.697-2.0625 2.3537-4.453 4.378-7.172 6.0727-2.7187 1.6947-5.531 2.8716-8.4374 3.5307v-4.5193zm22.5 0c1.4063-.3766 3-1.1063 4.7813-2.189 1.7812-1.0828 3.3984-2.3538 4.8515-3.8132 1.453-1.4593 2.6484-3.0364 3.586-4.731.9375-1.6948 1.3125-3.3896 1.125-5.0843-.1876-.3767-.7032-.612-1.547-.7062-.8437-.0942-1.6405-.1413-2.3906-.1413-2.3437 0-4.3828-.7767-6.117-2.3302-1.7345-1.5535-2.6017-3.7426-2.6017-6.567 0-2.7305.961-5.0843 2.8828-7.0615C58.9923.9886 61.172 0 63.6093 0c3.75 0 6.586 1.3652 8.508 4.0956C74.039 6.826 75 10.1684 75 14.1228c0 3.013-.6328 5.908-1.8984 8.6855-1.2657 2.7775-2.9297 5.343-4.9922 7.697-2.0625 2.3537-4.453 4.378-7.172 6.0727-2.7187 1.6947-5.531 2.8716-8.4374 3.5307v-4.5193z"
                  transform="rotate(180 37.5 20.054)" fill="url(#a)" fill-rule="evenodd"/>
        </svg>
        <div class="slider-holder controls--dots">
            <ul class="slides">
				<?php while ( have_rows( 'quotes', 'option' ) ):
					the_row(); ?>
                    <li class="item">
                        <p class="quote-content">"<?php the_sub_field( 'quote_text' ) ?>"</p>
                        <div class="quote-info">
							<?= wp_get_attachment_image( get_sub_field( 'quote_photo' ), 'medium' ) ?>
                            <div class="text-holder">
                                <span class="quote-name"><?php the_sub_field( 'quote_name' ) ?></span>
                                <p class="quote-title"><?php the_sub_field( 'quote_title' ) ?></p>
                            </div>
                        </div>
                    </li>
				<?php endwhile; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

