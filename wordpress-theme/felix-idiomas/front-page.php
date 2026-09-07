<?php
/**
 * Página inicial one page.
 *
 * @package felix-idiomas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$cal   = felix_calendar_link();
$whats = esc_url( felix_whats_link() );

$hero_btn1_url = felix_opt( 'felix_hero_btn1_url', '' );
$hero_btn1_url = $hero_btn1_url ? esc_url( $hero_btn1_url ) : $cal;
$hero_btn2_url = felix_opt( 'felix_hero_btn2_url', '' );
$hero_btn2_url = $hero_btn2_url ? esc_url( $hero_btn2_url ) : $whats;
?>

<main id="topo">

	<!-- ================= HERO ================= -->
	<section class="fx-dark fx-hero">
		<div class="fx-wrap fx-hero-grid">
			<div class="fx-reveal">
				<span class="fx-pill"><?php echo esc_html( felix_opt( 'felix_hero_pill', '' ) ); ?></span>
				<h1 class="fx-h1"><?php echo esc_html( felix_opt( 'felix_hero_title', '' ) ); ?></h1>
				<p class="fx-hero-sub"><?php echo esc_html( felix_opt( 'felix_hero_sub', '' ) ); ?></p>

				<div class="fx-btn-row">
					<a class="fx-btn fx-btn-gold" href="<?php echo $hero_btn1_url; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_hero_btn1', 'Agendar avaliação gratuita' ) ); ?></a>
					<a class="fx-btn fx-btn-outline" href="<?php echo $hero_btn2_url; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_hero_btn2', 'Falar no WhatsApp' ) ); ?></a>
				</div>

				<dl class="fx-stats">
					<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
						<div>
							<dt class="fx-stat-n"><?php echo esc_html( felix_opt( "felix_stat{$i}_n", '' ) ); ?></dt>
							<dd class="fx-stat-l" style="margin:0"><?php echo esc_html( felix_opt( "felix_stat{$i}_l", '' ) ); ?></dd>
						</div>
					<?php endfor; ?>
				</dl>
			</div>

			<div class="fx-framed fx-reveal">
				<img src="<?php echo felix_img( 'felix_hero_img', 'hero.jpg' ); ?>" alt="<?php esc_attr_e( 'Félix Idiomas', 'felix-idiomas' ); ?>" width="1064" height="1600">
			</div>
		</div>
	</section>

	<!-- ================= DORES ================= -->
	<section class="fx-light fx-section">
		<div class="fx-wrap fx-center">
			<h2 class="fx-h2 fx-reveal"><?php echo esc_html( felix_opt( 'felix_dores_title', '' ) ); ?></h2>
			<p class="fx-lead fx-reveal"><?php echo esc_html( felix_opt( 'felix_dores_sub', '' ) ); ?></p>

			<div class="fx-grid-3">
				<?php
				for ( $i = 1; $i <= 6; $i++ ) :
					$dor = felix_opt( "felix_dor{$i}", '' );
					if ( ! $dor ) {
						continue;
					}
					?>
					<div class="fx-card fx-reveal">
						<span class="fx-card-x">&#10005;</span>
						<p><?php echo esc_html( $dor ); ?></p>
					</div>
				<?php endfor; ?>
			</div>

			<div class="fx-btn-row">
				<a class="fx-btn fx-btn-ghost" href="<?php echo $whats; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_dores_btn', 'Falar no WhatsApp' ) ); ?></a>
			</div>
		</div>
	</section>

	<!-- ================= PROGRAMAS ================= -->
	<section id="programas" class="fx-dark fx-section">
		<div class="fx-wrap">
			<div class="fx-center">
				<p class="fx-eyebrow fx-reveal"><?php echo esc_html( felix_opt( 'felix_prog_eyebrow', 'Programas' ) ); ?></p>
				<h2 class="fx-h2 fx-reveal" style="color:var(--ivory)"><?php echo esc_html( felix_opt( 'felix_prog_title', '' ) ); ?></h2>
				<p class="fx-lead fx-reveal"><?php echo esc_html( felix_opt( 'felix_prog_sub', '' ) ); ?></p>
			</div>

			<div class="fx-grid-3">
				<?php
				$imgs = array(
					1 => 'aula.jpg',
					2 => 'incompany.jpg',
					3 => 'mundo.jpg',
				);
				for ( $i = 1; $i <= 3; $i++ ) :
					if ( ! felix_opt( "felix_prog{$i}_title", '' ) ) {
						continue;
					}
					?>
					<article class="fx-program fx-reveal">
						<img src="<?php echo felix_img( "felix_prog{$i}_img", $imgs[ $i ] ); ?>" alt="<?php echo esc_attr( felix_opt( "felix_prog{$i}_title", '' ) ); ?>" loading="lazy" width="1200" height="912">
						<div class="fx-program-body">
							<h3><?php echo esc_html( felix_opt( "felix_prog{$i}_title", '' ) ); ?></h3>
							<p><?php echo esc_html( felix_opt( "felix_prog{$i}_desc", '' ) ); ?></p>
							<ul class="fx-list">
								<?php
								for ( $b = 1; $b <= 3; $b++ ) :
									$item = felix_opt( "felix_prog{$i}_b{$b}", '' );
									if ( ! $item ) {
										continue;
									}
									?>
									<li><?php echo esc_html( $item ); ?></li>
								<?php endfor; ?>
							</ul>
							<p style="margin-top:26px">
								<a class="fx-btn fx-btn-ghost" href="<?php echo $cal; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_prog_btn', 'Agendar avaliação gratuita' ) ); ?></a>
							</p>
						</div>
					</article>
				<?php endfor; ?>
			</div>
		</div>
	</section>

	<!-- ================= MÉTODO ================= -->
	<section id="metodo" class="fx-light fx-section">
		<div class="fx-wrap">
			<div class="fx-center">
				<p class="fx-eyebrow fx-reveal"><?php echo esc_html( felix_opt( 'felix_metodo_eyebrow', '' ) ); ?></p>
				<h2 class="fx-h2 fx-reveal"><?php echo esc_html( felix_opt( 'felix_metodo_title', '' ) ); ?></h2>
				<p class="fx-lead fx-reveal"><?php echo esc_html( felix_opt( 'felix_metodo_sub', '' ) ); ?></p>
			</div>

			<div class="fx-grid-3">
				<?php
				for ( $i = 1; $i <= 3; $i++ ) :
					if ( ! felix_opt( "felix_step{$i}_title", '' ) ) {
						continue;
					}
					?>
					<div class="fx-card fx-step fx-reveal">
						<span class="fx-step-n"><?php echo esc_html( felix_opt( "felix_step{$i}_n", '' ) ); ?></span>
						<h3><?php echo esc_html( felix_opt( "felix_step{$i}_title", '' ) ); ?></h3>
						<p><?php echo esc_html( felix_opt( "felix_step{$i}_text", '' ) ); ?></p>
					</div>
				<?php endfor; ?>
			</div>

			<div class="fx-btn-row" style="justify-content:center">
				<a class="fx-btn fx-btn-gold" href="<?php echo $cal; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_metodo_btn1', '' ) ); ?></a>
				<a class="fx-btn fx-btn-ghost" href="<?php echo $whats; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_metodo_btn2', '' ) ); ?></a>
			</div>
		</div>
	</section>

	<!-- ================= AMANDA ================= -->
	<section id="amanda" class="fx-dark fx-section">
		<div class="fx-wrap fx-amanda">
			<div class="fx-framed fx-reveal">
				<img src="<?php echo felix_img( 'felix_amanda_img', 'amanda.jpg' ); ?>" alt="<?php echo esc_attr( felix_opt( 'felix_amanda_sign', 'Amanda Félix' ) ); ?>" loading="lazy" width="1064" height="1600">
			</div>

			<div class="fx-reveal">
				<p class="fx-eyebrow"><?php echo esc_html( felix_opt( 'felix_amanda_eyebrow', '' ) ); ?></p>
				<h2 class="fx-h2" style="color:var(--ivory)"><?php echo esc_html( felix_opt( 'felix_amanda_title', '' ) ); ?></h2>

				<div class="fx-prose">
					<?php
					$amanda_text = felix_opt( 'felix_amanda_text', '' );
					if ( $amanda_text ) {
						echo wp_kses_post( wpautop( $amanda_text ) );
					} else {
						?>
						<p><?php esc_html_e( 'Durante anos, acreditei que o inglês era um território reservado a poucos. Na escola, o idioma chegava até mim em forma de regra, decoreba e, sobretudo, de medo: medo de errar, de falar, de ser julgada.', 'felix-idiomas' ); ?></p>
						<p><?php esc_html_e( 'Estudei muito. Minha gramática amadureceu, minha escrita evoluiu. Mas, quando precisei falar de verdade — fora do Brasil, diante de pessoas reais —, eu travei. As palavras existiam, só não saíam.', 'felix-idiomas' ); ?></p>
						<p><?php esc_html_e( 'A fluência não veio dos livros. Veio da vida: de trabalhar internacionalmente, de viver em inglês todos os dias, de construir um relacionamento intercultural, de errar, ser corrigida e tentar de novo até acertar.', 'felix-idiomas' ); ?></p>
						<p><?php esc_html_e( 'Foi dessa vivência que nasceu a Félix Idiomas. Nosso compromisso é simples: poupar você do caminho sofrido e levá-lo direto ao resultado. Você não precisa provar que é capaz — precisa apenas dar o primeiro passo. O seu “Hello”.', 'felix-idiomas' ); ?></p>
						<?php
					}
					?>
				</div>

				<p class="fx-sign"><?php echo esc_html( felix_opt( 'felix_amanda_sign', '' ) ); ?></p>
				<p class="fx-sign-role"><?php echo esc_html( felix_opt( 'felix_amanda_role', '' ) ); ?></p>

				<div class="fx-btn-row">
					<a class="fx-btn fx-btn-gold" href="<?php echo $cal; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_amanda_btn1', '' ) ); ?></a>
					<a class="fx-btn fx-btn-outline" href="<?php echo $whats; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_amanda_btn2', '' ) ); ?></a>
				</div>
			</div>
		</div>

		<?php
		$gal = array();
		for ( $i = 1; $i <= 8; $i++ ) {
			$src = felix_media_image_url( "felix_gal{$i}_img" );
			if ( $src ) {
				$gal[] = array( $src, felix_opt( "felix_gal{$i}_cap", '' ) );
			}
		}
		if ( $gal ) :
			?>
			<div class="fx-wrap fx-gallery-wrap">
				<div class="fx-center">
					<h3 class="fx-h3-gal fx-reveal"><?php echo esc_html( felix_opt( 'felix_galeria_title', '' ) ); ?></h3>
					<p class="fx-lead fx-reveal"><?php echo esc_html( felix_opt( 'felix_galeria_sub', '' ) ); ?></p>
				</div>
				<div class="fx-carousel fx-carousel-gal fx-reveal" data-fx-carousel>
					<button class="fx-car-nav fx-car-prev" type="button" data-fx-prev aria-label="<?php esc_attr_e( 'Anterior', 'felix-idiomas' ); ?>">&#8249;</button>
					<div class="fx-carousel-track fx-gallery" data-fx-track>
						<?php foreach ( $gal as $g ) : ?>
							<figure class="fx-gal-item">
								<img src="<?php echo $g[0]; ?>" alt="<?php echo esc_attr( $g[1] ? $g[1] : __( 'Viagem', 'felix-idiomas' ) ); ?>" loading="lazy">
								<?php if ( $g[1] ) : ?>
									<figcaption><?php echo esc_html( $g[1] ); ?></figcaption>
								<?php endif; ?>
							</figure>
						<?php endforeach; ?>
					</div>
					<button class="fx-car-nav fx-car-next" type="button" data-fx-next aria-label="<?php esc_attr_e( 'Próximo', 'felix-idiomas' ); ?>">&#8250;</button>
					<div class="fx-car-dots" data-fx-dots></div>
				</div>
			</div>
		<?php endif; ?>
	</section>

	<!-- ================= PROFESSORES ================= -->
	<section id="professores" class="fx-light fx-section">
		<div class="fx-wrap fx-narrow fx-center">
			<p class="fx-eyebrow fx-reveal"><?php echo esc_html( felix_opt( 'felix_prof_eyebrow', '' ) ); ?></p>
			<h2 class="fx-h2 fx-reveal"><?php echo esc_html( felix_opt( 'felix_prof_title', '' ) ); ?></h2>
			<div class="fx-reveal">
				<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
					<?php $p = felix_opt( "felix_prof_p{$i}", '' ); ?>
					<?php if ( $p ) : ?>
						<p class="fx-lead"><?php echo esc_html( $p ); ?></p>
					<?php endif; ?>
				<?php endfor; ?>
			</div>
			<div class="fx-line"></div>
			<a class="fx-btn fx-btn-gold fx-reveal" href="<?php echo $cal; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_prof_btn', '' ) ); ?></a>
		</div>
	</section>

	<!-- ================= DEPOIMENTOS ================= -->
	<section id="depoimentos" class="fx-dark fx-section">
		<div class="fx-wrap">
			<div class="fx-center">
				<p class="fx-eyebrow fx-reveal"><?php echo esc_html( felix_opt( 'felix_depo_eyebrow', '' ) ); ?></p>
				<h2 class="fx-h2 fx-reveal" style="color:var(--ivory)"><?php echo esc_html( felix_opt( 'felix_depo_title', '' ) ); ?></h2>
			</div>

			<div class="fx-grid-3">
				<?php
				for ( $i = 1; $i <= 6; $i++ ) :
					$nome = felix_opt( "felix_depo{$i}_nome", '' );
					if ( ! $nome ) {
						continue;
					}
					?>
					<figure class="fx-quote fx-reveal" style="margin:0">
						<div class="fx-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
						<blockquote>&ldquo;<?php echo esc_html( felix_opt( "felix_depo{$i}_texto", '' ) ); ?>&rdquo;</blockquote>
						<figcaption>
							<strong><?php echo esc_html( $nome ); ?></strong>
							<span><?php echo esc_html( felix_opt( "felix_depo{$i}_cargo", '' ) ); ?></span>
						</figcaption>
					</figure>
				<?php endfor; ?>
			</div>

			<div class="fx-btn-row" style="justify-content:center">
				<a class="fx-btn fx-btn-ghost" href="<?php echo $whats; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_depo_btn', '' ) ); ?></a>
			</div>
		</div>
	</section>

	<!-- ================= DEPOIMENTOS EM FOTO ================= -->
	<?php
	$depofotos = array();
	for ( $i = 1; $i <= 6; $i++ ) {
		$src = felix_media_image_url( "felix_depofoto{$i}_img" );
		if ( $src ) {
			$depofotos[] = array( $src, felix_opt( "felix_depofoto{$i}_cap", '' ) );
		}
	}
	if ( $depofotos ) :
		?>
		<section id="depoimentos-fotos" class="fx-light fx-section">
			<div class="fx-wrap">
				<div class="fx-center">
					<p class="fx-eyebrow fx-reveal"><?php echo esc_html( felix_opt( 'felix_depofoto_eyebrow', '' ) ); ?></p>
					<h2 class="fx-h2 fx-reveal"><?php echo esc_html( felix_opt( 'felix_depofoto_title', '' ) ); ?></h2>
					<p class="fx-lead fx-reveal"><?php echo esc_html( felix_opt( 'felix_depofoto_sub', '' ) ); ?></p>
				</div>

				<div class="fx-carousel fx-carousel-shots fx-reveal" data-fx-carousel>
					<button class="fx-car-nav fx-car-prev" type="button" data-fx-prev aria-label="<?php esc_attr_e( 'Anterior', 'felix-idiomas' ); ?>">&#8249;</button>
					<div class="fx-carousel-track fx-shots" data-fx-track>
						<?php foreach ( $depofotos as $d ) : ?>
							<figure class="fx-shot">
								<img src="<?php echo $d[0]; ?>" alt="<?php echo esc_attr( $d[1] ? $d[1] : __( 'Depoimento de aluno', 'felix-idiomas' ) ); ?>" loading="lazy">
								<?php if ( $d[1] ) : ?>
									<figcaption><?php echo esc_html( $d[1] ); ?></figcaption>
								<?php endif; ?>
							</figure>
						<?php endforeach; ?>
					</div>
					<button class="fx-car-nav fx-car-next" type="button" data-fx-next aria-label="<?php esc_attr_e( 'Próximo', 'felix-idiomas' ); ?>">&#8250;</button>
					<div class="fx-car-dots" data-fx-dots></div>
				</div>

				<div class="fx-btn-row" style="justify-content:center">
					<a class="fx-btn fx-btn-gold" href="<?php echo $cal; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_depofoto_btn', '' ) ); ?></a>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- ================= VÍDEOS ================= -->
	<?php
	$videos = array();
	for ( $i = 1; $i <= 2; $i++ ) {
		$vurl = felix_embed_url( felix_opt( "felix_video{$i}_url", '' ) );
		if ( $vurl ) {
			$videos[] = array( $vurl, felix_opt( "felix_video{$i}_title", '' ) );
		}
	}
	if ( $videos ) :
		?>
		<section id="videos" class="fx-darker fx-section">
			<div class="fx-wrap">
				<div class="fx-center">
					<p class="fx-eyebrow fx-reveal"><?php echo esc_html( felix_opt( 'felix_video_eyebrow', '' ) ); ?></p>
					<h2 class="fx-h2 fx-reveal" style="color:var(--ivory)"><?php echo esc_html( felix_opt( 'felix_video_title', '' ) ); ?></h2>
				</div>

				<div class="fx-grid-2">
					<?php foreach ( $videos as $v ) : ?>
						<div class="fx-video fx-reveal">
							<div class="fx-video-ratio">
								<iframe src="<?php echo esc_url( $v[0] ); ?>" title="<?php echo esc_attr( $v[1] ); ?>" loading="lazy" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
							<p><?php echo esc_html( $v[1] ); ?></p>
						</div>
					<?php endforeach; ?>
				</div>

				<div class="fx-btn-row" style="justify-content:center">
					<a class="fx-btn fx-btn-gold" href="<?php echo $cal; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_video_btn', '' ) ); ?></a>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<!-- ================= FAQ ================= -->
	<section id="faq" class="fx-dark fx-section">
		<div class="fx-wrap fx-narrow">
			<div class="fx-center">
				<p class="fx-eyebrow fx-reveal"><?php echo esc_html( felix_opt( 'felix_faq_eyebrow', '' ) ); ?></p>
				<h2 class="fx-h2 fx-reveal" style="color:var(--ivory)"><?php echo esc_html( felix_opt( 'felix_faq_title', '' ) ); ?></h2>
			</div>

			<div class="fx-faq">
				<?php
				for ( $i = 1; $i <= 6; $i++ ) :
					$q = felix_opt( "felix_faq{$i}_q", '' );
					if ( ! $q ) {
						continue;
					}
					?>
					<details class="fx-reveal">
						<summary><?php echo esc_html( $q ); ?></summary>
						<p><?php echo esc_html( felix_opt( "felix_faq{$i}_a", '' ) ); ?></p>
					</details>
				<?php endfor; ?>
			</div>

			<div class="fx-btn-row" style="justify-content:center">
				<a class="fx-btn fx-btn-gold" href="<?php echo $whats; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_faq_btn', '' ) ); ?></a>
			</div>
		</div>
	</section>

	<!-- ================= CONTATO ================= -->
	<section id="contato" class="fx-darker fx-section">
		<div class="fx-wrap fx-contact">
			<div class="fx-reveal">
				<p class="fx-eyebrow"><?php echo esc_html( felix_opt( 'felix_contato_eyebrow', '' ) ); ?></p>
				<h2 class="fx-h2" style="color:var(--ivory)"><?php echo esc_html( felix_opt( 'felix_contato_title', '' ) ); ?></h2>
				<p class="fx-lead"><?php echo esc_html( felix_opt( 'felix_contato_sub', '' ) ); ?></p>

				<ul class="fx-list">
					<?php
					for ( $i = 1; $i <= 4; $i++ ) :
						$item = felix_opt( "felix_contato_item{$i}", '' );
						if ( ! $item ) {
							continue;
						}
						?>
						<li><?php echo esc_html( $item ); ?></li>
					<?php endfor; ?>
				</ul>

				<div class="fx-line"></div>
				<p style="color:rgba(243,239,232,0.6);font-size:15px"><?php echo esc_html( felix_contact_email() ); ?></p>

				<div class="fx-btn-row">
					<a class="fx-btn fx-btn-ghost" href="<?php echo $cal; ?>" target="_blank" rel="noopener"><?php echo esc_html( felix_opt( 'felix_contato_btn_agenda', '' ) ); ?></a>
				</div>
			</div>

			<div class="fx-reveal">
				<?php
				$status = isset( $_GET['fxform'] ) ? sanitize_key( wp_unslash( $_GET['fxform'] ) ) : '';
				if ( 'ok' === $status ) {
					echo '<div class="fx-alert fx-alert-ok">' . esc_html__( 'Recebido! Sua mensagem foi enviada e nossa equipe vai te responder em breve.', 'felix-idiomas' ) . '</div>';
				} elseif ( 'invalido' === $status ) {
					echo '<div class="fx-alert fx-alert-err">' . esc_html__( 'Confira os dados: nome, e-mail válido e telefone com DDD.', 'felix-idiomas' ) . '</div>';
				} elseif ( 'erro' === $status ) {
					echo '<div class="fx-alert fx-alert-err">' . esc_html__( 'Não conseguimos enviar agora. Fale com a gente pelo WhatsApp.', 'felix-idiomas' ) . '</div>';
				}
				?>

				<form class="fx-form" method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
					<input type="hidden" name="action" value="felix_contact">
					<?php wp_nonce_field( 'felix_contact', 'felix_contact_nonce' ); ?>
					<label class="fx-hp" aria-hidden="true">Website<input type="text" name="felix_website" tabindex="-1" autocomplete="off"></label>

					<input type="text" name="felix_nome" maxlength="100" required placeholder="<?php echo esc_attr( felix_opt( 'felix_form_nome', 'Nome completo' ) ); ?>">
					<input type="email" name="felix_email" maxlength="255" required placeholder="<?php echo esc_attr( felix_opt( 'felix_form_email', 'E-mail' ) ); ?>">
					<input type="tel" name="felix_telefone" maxlength="30" required placeholder="<?php echo esc_attr( felix_opt( 'felix_form_tel', 'WhatsApp com DDD' ) ); ?>">
					<select name="felix_programa">
						<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
							<?php $pt = felix_opt( "felix_prog{$i}_title", '' ); ?>
							<?php if ( $pt ) : ?>
								<option><?php echo esc_html( $pt ); ?></option>
							<?php endif; ?>
						<?php endfor; ?>
					</select>
					<textarea name="felix_mensagem" rows="4" maxlength="1000" placeholder="<?php echo esc_attr( felix_opt( 'felix_form_msg', '' ) ); ?>"></textarea>

					<button type="submit" class="fx-btn fx-btn-gold"><?php echo esc_html( felix_opt( 'felix_contato_btn', 'Enviar' ) ); ?></button>
					<p class="fx-form-note"><?php echo esc_html( felix_opt( 'felix_form_note', '' ) ); ?></p>
				</form>
			</div>
		</div>
	</section>

</main>

<?php
get_footer();
