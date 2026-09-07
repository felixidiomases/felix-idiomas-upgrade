<?php
/**
 * Félix Idiomas - funções do tema.
 *
 * @package felix-idiomas
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'FELIX_VERSION', '1.2.0' );

/* -------------------------------------------------------------------------
 * Suporte do tema
 * ---------------------------------------------------------------------- */

function felix_setup() {
	load_theme_textdomain( 'felix-idiomas', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 90,
			'width'       => 320,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	register_nav_menus(
		array(
			'principal' => __( 'Menu principal (topo)', 'felix-idiomas' ),
			'rodape'    => __( 'Menu do rodapé', 'felix-idiomas' ),
		)
	);

	$locations       = get_theme_mod( 'nav_menu_locations', array() );
	$legacy_location = html_entity_decode( 'rodap&eacute;', ENT_QUOTES, 'UTF-8' );
	if ( isset( $locations[ $legacy_location ] ) && ! isset( $locations['rodape'] ) ) {
		$locations['rodape'] = $locations[ $legacy_location ];
		unset( $locations[ $legacy_location ] );
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}
add_action( 'after_setup_theme', 'felix_setup' );

function felix_content_width() {
	$GLOBALS['content_width'] = 1180;
}
add_action( 'after_setup_theme', 'felix_content_width', 0 );

/* -------------------------------------------------------------------------
 * Estilos e scripts
 * ---------------------------------------------------------------------- */

function felix_assets() {
	wp_enqueue_style(
		'felix-fonts',
		'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Lato:wght@400;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'felix-style', get_stylesheet_uri(), array( 'felix-fonts' ), FELIX_VERSION );
	wp_enqueue_script( 'felix-script', get_template_directory_uri() . '/assets/js/theme.js', array(), FELIX_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'felix_assets' );

/* -------------------------------------------------------------------------
 * Helpers
 * ---------------------------------------------------------------------- */

/**
 * Valores essenciais da página inicial.
 *
 * Campos opcionais (vídeos e galerias) não entram aqui, pois precisam poder
 * permanecer vazios quando a pessoa decidir ocultá-los.
 */
function felix_defaults() {
	$defaults = array(
		'felix_hero_pill'       => 'Inglês que abre fronteiras',
		'felix_hero_title'      => 'Aprenda inglês e conquiste o mundo — do home office às grandes viagens',
		'felix_hero_sub'        => 'Para quem quer trabalhar no exterior, liderar negócios internacionais, viajar sem medo da língua ou construir uma carreira global do sofá de casa. Método prático, professor dedicado e aulas na sua rotina.',
		'felix_hero_btn1'       => 'Agendar avaliação gratuita',
		'felix_hero_btn2'       => 'Falar no WhatsApp',
		'felix_dores_title'     => 'O inglês não pode ser o teto dos seus sonhos',
		'felix_dores_sub'       => 'Seja para uma carreira global, uma viagem pelo mundo ou um emprego dos sonhos no exterior — o problema nunca foi você. É o método.',
		'felix_dor1'            => 'Quer trabalhar no exterior ou para empresas estrangeiras, mas o inglês trava na entrevista',
		'felix_dor2'            => 'Tem medo de viajar e não conseguir se comunicar sozinho em aeroportos, hotéis e reuniões',
		'felix_dor3'            => 'Sonha com home office internacional, mas perde oportunidades por não se sentir seguro',
		'felix_dor4'            => 'Entende algumas palavras, mas trava na hora de falar com naturalidade',
		'felix_dor5'            => 'Já tentou cursos genéricos e sentiu que nunca sairia do básico',
		'felix_dor6'            => 'Não tem tempo para turmas fixas e conteúdo que não tem a ver com a sua vida',
		'felix_dores_btn'       => 'Quero superar essas barreiras',
		'felix_prog_eyebrow'    => 'Programas',
		'felix_prog_title'      => 'O caminho certo para o seu objetivo',
		'felix_prog_sub'        => 'Empresário, nômade digital, futuro expatriado ou viajante de alma livre — aqui tem um programa que fala a sua língua.',
		'felix_prog1_title'     => 'One-to-One Executivo',
		'felix_prog1_desc'      => 'Aulas individuais 100% personalizadas ao seu setor, com professor dedicado e agenda sob medida.',
		'felix_prog1_b1'        => 'Plano de estudo exclusivo',
		'felix_prog1_b2'        => 'Online ou presencial',
		'felix_prog1_b3'        => 'Relatórios de evolução',
		'felix_prog2_title'     => 'In-Company Premium',
		'felix_prog2_desc'      => 'Treinamento corporativo para times de liderança, com métricas de progresso para o RH.',
		'felix_prog2_b1'        => 'Turmas por nível',
		'felix_prog2_b2'        => 'Business cases reais',
		'felix_prog2_b3'        => 'Dashboard de resultados',
		'felix_prog3_title'     => 'Inglês para o Mundo',
		'felix_prog3_desc'      => 'Para quem quer trabalhar no exterior, viajar com liberdade ou conquistar vagas internacionais de home office.',
		'felix_prog3_b1'        => 'Conversação do dia a dia',
		'felix_prog3_b2'        => 'Entrevistas e apresentações',
		'felix_prog3_b3'        => 'Cultura e networking global',
		'felix_prog_btn'        => 'Agendar avaliação gratuita',
		'felix_metodo_eyebrow'  => 'Metodologia Félix',
		'felix_metodo_title'    => 'Do bloqueio à fluência — e da fluência ao seu sonho',
		'felix_metodo_sub'      => 'Uma metodologia que respeita a sua história, a sua rotina e o seu objetivo.',
		'felix_step1_n'         => '01',
		'felix_step1_title'     => 'Avaliação: onde você está hoje',
		'felix_step1_text'      => 'Uma conversa de 30 minutos, sem prova e sem pressão. Escutamos a sua história, identificamos o seu nível real e mapeamos exatamente o que trava a sua fala.',
		'felix_step2_n'         => '02',
		'felix_step2_title'     => 'Plano: para onde você quer ir',
		'felix_step2_text'      => 'Com o diagnóstico em mãos, desenhamos um plano de estudos 100% personalizado — com temas ligados à sua rotina, à sua profissão e aos seus objetivos.',
		'felix_step3_n'         => '03',
		'felix_step3_title'     => 'Jornada: do sonho à realidade',
		'felix_step3_text'      => 'Você evolui no seu ritmo, guiado por professores que aplicam a metodologia Félix. Do primeiro “Hello” à fluência que abre as portas que você sempre quis atravessar.',
		'felix_metodo_btn1'     => 'Começar minha avaliação gratuita',
		'felix_metodo_btn2'     => 'Tirar dúvidas no WhatsApp',
		'felix_amanda_eyebrow'  => 'Quem está por trás',
		'felix_amanda_title'    => 'Amanda Félix — CEO e fundadora',
		'felix_amanda_sign'     => 'Amanda Félix',
		'felix_amanda_role'     => 'CEO e fundadora — Félix Idiomas',
		'felix_amanda_btn1'     => 'Quero dar o meu primeiro passo',
		'felix_amanda_btn2'     => 'Falar com a equipe',
		'felix_galeria_title'   => 'O mundo que o inglês abriu',
		'felix_galeria_sub'     => 'Alguns dos lugares onde Amanda viveu, trabalhou e se comunicou em inglês.',
		'felix_prof_eyebrow'    => 'Sobre os professores',
		'felix_prof_title'      => 'Guias que caminham com você',
		'felix_prof_p1'         => 'Na Félix Idiomas, você pode ter diferentes professores ao longo da jornada — e isso é um diferencial planejado, não um acaso.',
		'felix_prof_p2'         => 'Na vida real, você conversa com pessoas diferentes: sotaques, ritmos e estilos distintos. Nossa estrutura prepara você justamente para essa diversidade.',
		'felix_prof_p3'         => 'Todo o time segue a mesma metodologia personalizada. O professor é o guia que acompanha você — e você é o protagonista da própria jornada.',
		'felix_prof_btn'        => 'Agendar minha avaliação gratuita',
		'felix_depo_eyebrow'    => 'Depoimentos',
		'felix_depo_title'      => 'Resultados de quem já vive em inglês',
		'felix_depo_btn'        => 'Quero resultados como esses',
		'felix_depofoto_eyebrow'=> 'Prova real',
		'felix_depofoto_title'  => 'O que os alunos mandam para a gente',
		'felix_depofoto_sub'    => 'Mensagens e conquistas reais de quem destravou o inglês com a Félix Idiomas.',
		'felix_depofoto_btn'    => 'Quero viver isso também',
		'felix_faq_eyebrow'     => 'Perguntas frequentes',
		'felix_faq_title'       => 'Tudo o que você precisa saber antes do seu “Hello”',
		'felix_faq_btn'         => 'Ainda tenho dúvidas — quero falar agora',
		'felix_contato_eyebrow' => 'Agende agora',
		'felix_contato_title'   => 'Sua avaliação de nível é gratuita',
		'felix_contato_sub'     => 'Em 30 minutos, descobrimos onde você está, para onde quer ir e montamos o caminho mais rápido para você chegar lá.',
		'felix_contato_item1'   => 'Aulas online de qualquer lugar do Brasil',
		'felix_contato_item2'   => 'Professores certificados CELTA/TESOL',
		'felix_contato_item3'   => 'Materiais premium inclusos',
		'felix_contato_item4'   => 'Foco em conversação desde o primeiro dia',
		'felix_contato_btn_agenda' => 'Agendar pela agenda online',
		'felix_contato_btn'     => 'Quero abrir novas portas',
		'felix_form_nome'       => 'Nome completo',
		'felix_form_email'      => 'E-mail',
		'felix_form_tel'        => 'WhatsApp com DDD',
		'felix_form_msg'        => 'Conte seu objetivo: trabalho no exterior, viagem, home office internacional...',
		'felix_form_note'       => 'Seus dados estão seguros e não serão compartilhados.',
		'felix_footer_about'    => 'Inglês de alto nível para quem quer trabalhar, viajar e liderar em qualquer lugar do mundo.',
		'felix_footer_local'    => 'Goiânia — GO — aulas online para todo o Brasil e exterior',
		'felix_footer_copy'     => 'Félix Idiomas. Todos os direitos reservados.',
	);

	$testimonials = array(
		1 => array( 'Ricardo Almeida', 'CEO — Indústria Metalúrgica', 'Em 6 meses, passei a conduzir sozinho as negociações com nossos parceiros alemães. O método é direto ao ponto do meu dia a dia.' ),
		2 => array( 'Patrícia Menezes', 'Diretora Jurídica', 'Aulas na minha agenda, com professor que entende o vocabulário jurídico. Fechei minha primeira audiência internacional com segurança.' ),
		3 => array( 'Eduardo Tanaka', 'Sócio — Consultoria', 'O programa in-company elevou o time inteiro. Hoje apresentamos resultados em inglês para o board sem tradutor.' ),
		4 => array( 'Marina Costa', 'Product Manager — remoto para empresa americana', 'Consegui minha primeira vaga internacional em home office depois de 8 meses de aula. A confiança na entrevista fez toda a diferença.' ),
		5 => array( 'Thiago Ribeiro', 'Empresário e nômade digital', 'Viajei sozinho pela Europa e consegui resolver tudo em inglês. Antes eu nem pedia café. Hoje fecho parcerias em qualquer lugar.' ),
		6 => array( 'Juliana Ferreira', 'Enfermeira — rumo ao Canadá', 'Estou me preparando para o processo de imigração e já me sinto outra pessoa na fala. O medo de viajar virou animação.' ),
	);
	foreach ( $testimonials as $index => $testimonial ) {
		$defaults[ "felix_depo{$index}_nome" ]  = $testimonial[0];
		$defaults[ "felix_depo{$index}_cargo" ] = $testimonial[1];
		$defaults[ "felix_depo{$index}_texto" ] = $testimonial[2];
	}

	$faqs = array(
		1 => array( 'Nunca estudei inglês de verdade. Consigo começar do zero?', 'Sim. Boa parte dos nossos alunos chega travada. O plano começa exatamente no ponto em que você está, com foco em comunicação desde a primeira aula.' ),
		2 => array( 'As aulas são online ou presenciais?', 'Você escolhe. Atendemos alunos online em todo o Brasil e no exterior e também oferecemos formatos presenciais e in-company para empresas.' ),
		3 => array( 'Quanto tempo leva para eu conseguir me comunicar?', 'Depende do seu ponto de partida e da sua frequência, mas a maioria dos alunos relata segurança para conversas reais entre 3 e 6 meses.' ),
		4 => array( 'Tenho uma agenda muito cheia. Como funciona?', 'Os horários são combinados com você e o plano se ajusta à sua rotina — inclusive para quem viaja com frequência ou trabalha em fusos diferentes.' ),
		5 => array( 'O conteúdo é personalizado mesmo?', 'Sim. Trabalhamos com os temas da sua vida real: entrevistas, reuniões, viagens, atendimento a clientes internacionais ou processo de imigração.' ),
		6 => array( 'Como é a avaliação gratuita?', 'São 30 minutos de conversa, sem prova e sem cobrança. Entendemos seu nível, seus objetivos e apresentamos o caminho recomendado. Sem compromisso.' ),
	);
	foreach ( $faqs as $index => $faq ) {
		$defaults[ "felix_faq{$index}_q" ] = $faq[0];
		$defaults[ "felix_faq{$index}_a" ] = $faq[1];
	}

	return $defaults;
}

/**
 * Lê uma opção do Personalizar com valor padrão seguro.
 */
function felix_opt( $key, $default = '' ) {
	$defaults = felix_defaults();
	$fallback = array_key_exists( $key, $defaults ) ? $defaults[ $key ] : $default;
	$value    = get_theme_mod( $key, $fallback );
	return ( '' === $value || null === $value ) ? $fallback : $value;
}

/**
 * Retorna a URL de uma imagem: primeiro a escolhida no Personalizar,
 * senão a que já vem dentro do tema.
 */
function felix_img( $key, $fallback_file ) {
	$custom = get_theme_mod( $key );
	if ( $custom ) {
		return esc_url( $custom );
	}
	return esc_url( get_template_directory_uri() . '/assets/img/' . $fallback_file );
}

/**
 * Retorna apenas imagens existentes na Biblioteca de Mídia deste WordPress.
 */
function felix_media_image_url( $key ) {
	$url = get_theme_mod( $key, '' );
	if ( ! $url || ! wp_http_validate_url( $url ) ) {
		return '';
	}

	$attachment_id = attachment_url_to_postid( $url );
	if ( $attachment_id && wp_attachment_is_image( $attachment_id ) ) {
		$image_url = wp_get_attachment_image_url( $attachment_id, 'full' );
		return $image_url ? esc_url( $image_url ) : '';
	}

	return '';
}

function felix_whats_link() {
	$phone = preg_replace( '/\D/', '', felix_opt( 'felix_whats_phone', '556291618508' ) );
	$msg   = felix_opt( 'felix_whats_msg', 'Olá! Vim pelo site e gostaria de saber mais.' );
	return 'https://wa.me/' . $phone . '?text=' . rawurlencode( $msg );
}

function felix_calendar_link() {
	return esc_url( felix_opt( 'felix_calendar_url', 'https://calendar.app.google/2qyXrQivS9dsit9A8' ) );
}

function felix_contact_email() {
	return sanitize_email( felix_opt( 'felix_contact_email', 'felixidiomases@gmail.com' ) );
}

/**
 * Converte uma URL de vídeo (YouTube/Vimeo) em URL de embed.
 */
function felix_embed_url( $url ) {
	$url = trim( (string) $url );
	if ( '' === $url ) {
		return '';
	}
	if ( preg_match( '#youtube\.com/watch\?v=([\w-]+)#', $url, $m ) ) {
		return 'https://www.youtube.com/embed/' . $m[1];
	}
	if ( preg_match( '#youtu\.be/([\w-]+)#', $url, $m ) ) {
		return 'https://www.youtube.com/embed/' . $m[1];
	}
	if ( preg_match( '#youtube\.com/shorts/([\w-]+)#', $url, $m ) ) {
		return 'https://www.youtube.com/embed/' . $m[1];
	}
	if ( preg_match( '#vimeo\.com/(\d+)#', $url, $m ) ) {
		return 'https://player.vimeo.com/video/' . $m[1];
	}
	return esc_url( $url );
}

/* -------------------------------------------------------------------------
 * Menu de fallback (quando nenhum menu foi criado ainda)
 * ---------------------------------------------------------------------- */

function felix_default_nav_items() {
	return array(
		'#programas'   => __( 'Programas', 'felix-idiomas' ),
		'#metodo'      => __( 'Método', 'felix-idiomas' ),
		'#amanda'      => __( 'Amanda Félix', 'felix-idiomas' ),
		'#depoimentos' => __( 'Resultados', 'felix-idiomas' ),
		'#faq'         => __( 'FAQ', 'felix-idiomas' ),
		'#contato'     => __( 'Contato', 'felix-idiomas' ),
	);
}

function felix_fallback_menu() {
	echo '<ul>';
	foreach ( felix_default_nav_items() as $href => $label ) {
		printf(
			'<li><a href="%1$s">%2$s</a></li>',
			esc_url( home_url( '/' ) . $href ),
			esc_html( $label )
		);
	}
	echo '</ul>';
}

/* -------------------------------------------------------------------------
 * Formulário de contato (envia e-mail com wp_mail)
 * ---------------------------------------------------------------------- */

function felix_handle_contact() {
	$redirect = wp_get_referer() ? wp_get_referer() : home_url( '/' );

	if ( ! isset( $_POST['felix_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['felix_contact_nonce'] ) ), 'felix_contact' ) ) {
		wp_safe_redirect( add_query_arg( 'fxform', 'erro', $redirect ) . '#contato' );
		exit;
	}

	// Honeypot anti-spam.
	if ( ! empty( $_POST['felix_website'] ) ) {
		wp_safe_redirect( add_query_arg( 'fxform', 'ok', $redirect ) . '#contato' );
		exit;
	}

	$nome     = sanitize_text_field( wp_unslash( $_POST['felix_nome'] ?? '' ) );
	$email    = sanitize_email( wp_unslash( $_POST['felix_email'] ?? '' ) );
	$telefone = sanitize_text_field( wp_unslash( $_POST['felix_telefone'] ?? '' ) );
	$programa = sanitize_text_field( wp_unslash( $_POST['felix_programa'] ?? '' ) );
	$mensagem = sanitize_textarea_field( wp_unslash( $_POST['felix_mensagem'] ?? '' ) );

	$nome     = mb_substr( $nome, 0, 100 );
	$telefone = mb_substr( $telefone, 0, 30 );
	$programa = mb_substr( $programa, 0, 80 );
	$mensagem = mb_substr( $mensagem, 0, 1000 );

	if ( mb_strlen( $nome ) < 2 || ! is_email( $email ) || strlen( preg_replace( '/\D/', '', $telefone ) ) < 10 ) {
		wp_safe_redirect( add_query_arg( 'fxform', 'invalido', $redirect ) . '#contato' );
		exit;
	}

	$to      = felix_contact_email();
	$subject = sprintf( 'Novo contato pelo site - %s', $nome );
	$body    = "Novo contato recebido pelo site\n\n"
		. "Nome: {$nome}\n"
		. "E-mail: {$email}\n"
		. "WhatsApp: {$telefone}\n"
		. "Programa de interesse: {$programa}\n\n"
		. "Mensagem:\n" . ( $mensagem ? $mensagem : '(sem mensagem)' ) . "\n";

	$headers = array(
		'Content-Type: text/plain; charset=UTF-8',
		'Reply-To: ' . $nome . ' <' . $email . '>',
	);

	$sent = wp_mail( $to, $subject, $body, $headers );

	wp_safe_redirect( add_query_arg( 'fxform', $sent ? 'ok' : 'erro', $redirect ) . '#contato' );
	exit;
}
add_action( 'admin_post_nopriv_felix_contact', 'felix_handle_contact' );
add_action( 'admin_post_felix_contact', 'felix_handle_contact' );

/* -------------------------------------------------------------------------
 * Personalizar (Customizer)
 * ---------------------------------------------------------------------- */

function felix_customize_register( $wp_customize ) {

	$panel = 'felix_panel';
	$wp_customize->add_panel(
		$panel,
		array(
			'title'       => __( 'Félix Idiomas - conteúdo do site', 'felix-idiomas' ),
			'description' => __( 'Edite aqui os textos, links dos botões e as fotos da página inicial.', 'felix-idiomas' ),
			'priority'    => 20,
		)
	);

	$add_section = function ( $id, $title, $priority, $description = '' ) use ( $wp_customize, $panel ) {
		$wp_customize->add_section(
			$id,
			array(
				'title'       => $title,
				'panel'       => $panel,
				'priority'    => $priority,
				'description' => $description,
			)
		);
	};

	$add_text = function ( $id, $label, $section, $default, $type = 'text' ) use ( $wp_customize ) {
		$sanitize = 'url' === $type ? 'esc_url_raw' : ( 'email' === $type ? 'sanitize_email' : ( 'textarea' === $type ? 'wp_kses_post' : 'sanitize_text_field' ) );
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => $default,
				'sanitize_callback' => $sanitize,
				'transport'         => 'refresh',
			)
		);
		$wp_customize->add_control(
			$id,
			array(
				'label'   => $label,
				'section' => $section,
				'type'    => 'textarea' === $type ? 'textarea' : ( 'url' === $type ? 'url' : ( 'email' === $type ? 'email' : 'text' ) ),
			)
		);
	};

	$add_image = function ( $id, $label, $section ) use ( $wp_customize ) {
		$wp_customize->add_setting(
			$id,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				$id,
				array(
					'label'   => $label,
					'section' => $section,
				)
			)
		);
	};

	/* ---- Contato e botões globais ---- */
	$add_section( 'felix_global', __( '1. Botões, WhatsApp e agenda', 'felix-idiomas' ), 10 );
	$add_text( 'felix_calendar_url', __( 'Link da agenda (botão Agendar avaliação)', 'felix-idiomas' ), 'felix_global', 'https://calendar.app.google/2qyXrQivS9dsit9A8', 'url' );
	$add_text( 'felix_whats_phone', __( 'WhatsApp (somente números, com DDI. Ex: 556291618508)', 'felix-idiomas' ), 'felix_global', '556291618508' );
	$add_text( 'felix_whats_msg', __( 'Mensagem automática do WhatsApp', 'felix-idiomas' ), 'felix_global', 'Olá! Vim pelo site e gostaria de saber mais.' );
	$add_text( 'felix_contact_email', __( 'E-mail que recebe o formulário', 'felix-idiomas' ), 'felix_global', 'felixidiomases@gmail.com', 'email' );
	$add_text( 'felix_brand', __( 'Nome da marca (se não usar logo)', 'felix-idiomas' ), 'felix_global', 'Félix Idiomas' );

	/* ---- Hero ---- */
	$add_section( 'felix_hero', __( '2. Topo (Hero)', 'felix-idiomas' ), 20 );
	$add_text( 'felix_hero_pill', __( 'Selo acima do título', 'felix-idiomas' ), 'felix_hero', 'Inglês que abre fronteiras' );
	$add_text( 'felix_hero_title', __( 'Título principal', 'felix-idiomas' ), 'felix_hero', 'Aprenda inglês e conquiste o mundo — do home office às grandes viagens', 'textarea' );
	$add_text( 'felix_hero_sub', __( 'Subtítulo', 'felix-idiomas' ), 'felix_hero', 'Para quem quer trabalhar no exterior, liderar negócios internacionais, viajar sem medo da língua ou construir uma carreira global do sofá de casa. Método prático, professor dedicado e aulas na sua rotina.', 'textarea' );
	$add_text( 'felix_hero_btn1', __( 'Texto do botão 1', 'felix-idiomas' ), 'felix_hero', 'Agendar avaliação gratuita' );
	$add_text( 'felix_hero_btn1_url', __( 'Link do botão 1 (vazio = agenda)', 'felix-idiomas' ), 'felix_hero', '', 'url' );
	$add_text( 'felix_hero_btn2', __( 'Texto do botão 2', 'felix-idiomas' ), 'felix_hero', 'Falar no WhatsApp' );
	$add_text( 'felix_hero_btn2_url', __( 'Link do botão 2 (vazio = WhatsApp)', 'felix-idiomas' ), 'felix_hero', '', 'url' );
	$add_image( 'felix_hero_img', __( 'Foto do topo', 'felix-idiomas' ), 'felix_hero' );
	$add_text( 'felix_stat1_n', __( 'Número 1', 'felix-idiomas' ), 'felix_hero', '+18' );
	$add_text( 'felix_stat1_l', __( 'Legenda 1', 'felix-idiomas' ), 'felix_hero', 'anos de mercado' );
	$add_text( 'felix_stat2_n', __( 'Número 2', 'felix-idiomas' ), 'felix_hero', '+2.400' );
	$add_text( 'felix_stat2_l', __( 'Legenda 2', 'felix-idiomas' ), 'felix_hero', 'pessoas formadas' );
	$add_text( 'felix_stat3_n', __( 'Número 3', 'felix-idiomas' ), 'felix_hero', '96%' );
	$add_text( 'felix_stat3_l', __( 'Legenda 3', 'felix-idiomas' ), 'felix_hero', 'de satisfação' );

	/* ---- Dores ---- */
	$add_section( 'felix_dores', __( '3. Bloco "dores"', 'felix-idiomas' ), 25 );
	$add_text( 'felix_dores_title', __( 'Título', 'felix-idiomas' ), 'felix_dores', 'O inglês não pode ser o teto dos seus sonhos' );
	$add_text( 'felix_dores_sub', __( 'Subtítulo', 'felix-idiomas' ), 'felix_dores', 'Seja para uma carreira global, uma viagem pelo mundo ou um emprego dos sonhos no exterior — o problema nunca foi você. É o método.', 'textarea' );
	$dores_def = array(
		'Quer trabalhar no exterior ou para empresas estrangeiras, mas o inglês trava na entrevista',
		'Tem medo de viajar e não conseguir se comunicar sozinho em aeroportos, hotéis e reuniões',
		'Sonha com home office internacional, mas perde oportunidades por não se sentir seguro',
		'Entende algumas palavras, mas trava na hora de falar com naturalidade',
		'Já tentou cursos genéricos e sentiu que nunca sairia do básico',
		'Não tem tempo para turmas fixas e conteúdo que não tem a ver com a sua vida',
	);
	for ( $i = 1; $i <= 6; $i++ ) {
		$add_text( "felix_dor{$i}", sprintf( __( 'Item %d (vazio = oculta)', 'felix-idiomas' ), $i ), 'felix_dores', $dores_def[ $i - 1 ], 'textarea' );
	}
	$add_text( 'felix_dores_btn', __( 'Texto do botão', 'felix-idiomas' ), 'felix_dores', 'Quero superar essas barreiras' );

	/* ---- Programas ---- */
	$add_section( 'felix_programas', __( '4. Programas', 'felix-idiomas' ), 30 );
	$add_text( 'felix_prog_eyebrow', __( 'Etiqueta da seção', 'felix-idiomas' ), 'felix_programas', 'Programas' );
	$add_text( 'felix_prog_title', __( 'Título da seção', 'felix-idiomas' ), 'felix_programas', 'O caminho certo para o seu objetivo' );
	$add_text( 'felix_prog_sub', __( 'Subtítulo da seção', 'felix-idiomas' ), 'felix_programas', 'Empresário, nômade digital, futuro expatriado ou viajante de alma livre — aqui tem um programa que fala a sua língua.', 'textarea' );
	$prog_def = array(
		1 => array( 'One-to-One Executivo', 'Aulas individuais 100% personalizadas ao seu setor, com professor dedicado e agenda sob medida.', 'Plano de estudo exclusivo', 'Online ou presencial', 'Relatórios de evolução' ),
		2 => array( 'In-Company Premium', 'Treinamento corporativo para times de liderança, com métricas de progresso para o RH.', 'Turmas por nível', 'Business cases reais', 'Dashboard de resultados' ),
		3 => array( 'Inglês para o Mundo', 'Para quem quer trabalhar no exterior, viajar com liberdade ou conquistar vagas internacionais de home office.', 'Conversação do dia a dia', 'Entrevistas e apresentações', 'Cultura e networking global' ),
	);
	for ( $i = 1; $i <= 3; $i++ ) {
		$add_text( "felix_prog{$i}_title", sprintf( __( 'Programa %d - título', 'felix-idiomas' ), $i ), 'felix_programas', $prog_def[ $i ][0] );
		$add_text( "felix_prog{$i}_desc", sprintf( __( 'Programa %d - descrição', 'felix-idiomas' ), $i ), 'felix_programas', $prog_def[ $i ][1], 'textarea' );
		$add_image( "felix_prog{$i}_img", sprintf( __( 'Programa %d - foto', 'felix-idiomas' ), $i ), 'felix_programas' );
		for ( $b = 1; $b <= 3; $b++ ) {
			$add_text( "felix_prog{$i}_b{$b}", sprintf( __( 'Programa %1$d - item %2$d', 'felix-idiomas' ), $i, $b ), 'felix_programas', $prog_def[ $i ][ $b + 1 ] );
		}
	}
	$add_text( 'felix_prog_btn', __( 'Texto do botão dos cards', 'felix-idiomas' ), 'felix_programas', 'Agendar avaliação gratuita' );

	/* ---- Método ---- */
	$add_section( 'felix_metodo', __( '5. Metodologia', 'felix-idiomas' ), 35 );
	$add_text( 'felix_metodo_eyebrow', __( 'Etiqueta', 'felix-idiomas' ), 'felix_metodo', 'Metodologia Félix' );
	$add_text( 'felix_metodo_title', __( 'Título', 'felix-idiomas' ), 'felix_metodo', 'Do bloqueio à fluência — e da fluência ao seu sonho' );
	$add_text( 'felix_metodo_sub', __( 'Subtítulo', 'felix-idiomas' ), 'felix_metodo', 'Uma metodologia que respeita a sua história, a sua rotina e o seu objetivo.', 'textarea' );
	$steps_def = array(
		1 => array( '01', 'Avaliação: onde você está hoje', 'Uma conversa de 30 minutos, sem prova e sem pressão. Escutamos a sua história, identificamos o seu nível real e mapeamos exatamente o que trava a sua fala.' ),
		2 => array( '02', 'Plano: para onde você quer ir', 'Com o diagnóstico em mãos, desenhamos um plano de estudos 100% personalizado — com temas ligados à sua rotina, à sua profissão e aos seus objetivos.' ),
		3 => array( '03', 'Jornada: do sonho à realidade', 'Você evolui no seu ritmo, guiado por professores que aplicam a metodologia Félix. Do primeiro “Hello” à fluência que abre as portas que você sempre quis atravessar.' ),
	);
	for ( $i = 1; $i <= 3; $i++ ) {
		$add_text( "felix_step{$i}_n", sprintf( __( 'Etapa %d - número', 'felix-idiomas' ), $i ), 'felix_metodo', $steps_def[ $i ][0] );
		$add_text( "felix_step{$i}_title", sprintf( __( 'Etapa %d - título', 'felix-idiomas' ), $i ), 'felix_metodo', $steps_def[ $i ][1] );
		$add_text( "felix_step{$i}_text", sprintf( __( 'Etapa %d - texto', 'felix-idiomas' ), $i ), 'felix_metodo', $steps_def[ $i ][2], 'textarea' );
	}
	$add_text( 'felix_metodo_btn1', __( 'Botão 1', 'felix-idiomas' ), 'felix_metodo', 'Começar minha avaliação gratuita' );
	$add_text( 'felix_metodo_btn2', __( 'Botão 2 (WhatsApp)', 'felix-idiomas' ), 'felix_metodo', 'Tirar dúvidas no WhatsApp' );

	/* ---- Amanda ---- */
	$add_section( 'felix_amanda', __( '6. Amanda Félix (CEO)', 'felix-idiomas' ), 40, __( 'A galeria de viagens (carrossel) só aparece no site depois que você enviar pelo menos uma foto nos campos "Viagem 1 a 8".', 'felix-idiomas' ) );
	$add_text( 'felix_amanda_eyebrow', __( 'Etiqueta', 'felix-idiomas' ), 'felix_amanda', 'Quem está por trás' );
	$add_text( 'felix_amanda_title', __( 'Título', 'felix-idiomas' ), 'felix_amanda', 'Amanda Félix — CEO e fundadora' );
	$add_text( 'felix_amanda_text', __( 'Texto (um parágrafo por linha)', 'felix-idiomas' ), 'felix_amanda', '', 'textarea' );
	$add_image( 'felix_amanda_img', __( 'Foto da Amanda', 'felix-idiomas' ), 'felix_amanda' );
	$add_text( 'felix_amanda_sign', __( 'Assinatura', 'felix-idiomas' ), 'felix_amanda', 'Amanda Félix' );
	$add_text( 'felix_amanda_role', __( 'Cargo da assinatura', 'felix-idiomas' ), 'felix_amanda', 'CEO e fundadora — Félix Idiomas' );
	$add_text( 'felix_amanda_btn1', __( 'Botão 1 (agenda)', 'felix-idiomas' ), 'felix_amanda', 'Quero dar o meu primeiro passo' );
	$add_text( 'felix_amanda_btn2', __( 'Botão 2 (WhatsApp)', 'felix-idiomas' ), 'felix_amanda', 'Falar com a equipe' );
	$add_text( 'felix_galeria_title', __( 'Galeria de viagens - título', 'felix-idiomas' ), 'felix_amanda', 'O mundo que o inglês abriu' );
	$add_text( 'felix_galeria_sub', __( 'Galeria de viagens - texto', 'felix-idiomas' ), 'felix_amanda', 'Alguns dos lugares onde a Amanda viveu, trabalhou e se comunicou em inglês.', 'textarea' );
	$gal_def = array_fill( 0, 8, '' );
	for ( $i = 1; $i <= 8; $i++ ) {
		$wp_customize->add_setting(
			"felix_gal{$i}_img",
			array(
				'default'           => $gal_def[ $i - 1 ],
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				"felix_gal{$i}_img",
				array(
					'label'       => sprintf( __( 'Viagem %d - foto', 'felix-idiomas' ), $i ),
					'description' => __( 'Escolha uma imagem da Biblioteca de Mídia. Deixe vazio para remover esta foto.', 'felix-idiomas' ),
					'section'     => 'felix_amanda',
				)
			)
		);
		$add_text( "felix_gal{$i}_cap", sprintf( __( 'Viagem %d - legenda', 'felix-idiomas' ), $i ), 'felix_amanda', '' );
	}

	/* ---- Professores ---- */
	$add_section( 'felix_professores', __( '7. Professores', 'felix-idiomas' ), 45 );
	$add_text( 'felix_prof_eyebrow', __( 'Etiqueta', 'felix-idiomas' ), 'felix_professores', 'Sobre os professores' );
	$add_text( 'felix_prof_title', __( 'Título', 'felix-idiomas' ), 'felix_professores', 'Guias que caminham com você' );
	$add_text( 'felix_prof_p1', __( 'Parágrafo 1', 'felix-idiomas' ), 'felix_professores', 'Na Félix Idiomas, você pode ter diferentes professores ao longo da jornada — e isso é um diferencial planejado, não um acaso.', 'textarea' );
	$add_text( 'felix_prof_p2', __( 'Parágrafo 2', 'felix-idiomas' ), 'felix_professores', 'Na vida real, você conversa com pessoas diferentes: sotaques, ritmos e estilos distintos. Nossa estrutura prepara você justamente para essa diversidade.', 'textarea' );
	$add_text( 'felix_prof_p3', __( 'Parágrafo 3', 'felix-idiomas' ), 'felix_professores', 'Todo o time segue a mesma metodologia personalizada. O professor é o guia que acompanha você — e você é o protagonista da própria jornada.', 'textarea' );
	$add_text( 'felix_prof_btn', __( 'Texto do botão', 'felix-idiomas' ), 'felix_professores', 'Agendar minha avaliação gratuita' );

	/* ---- Depoimentos (texto) ---- */
	$add_section( 'felix_depoimentos', __( '8. Depoimentos (texto)', 'felix-idiomas' ), 50 );
	$add_text( 'felix_depo_eyebrow', __( 'Etiqueta', 'felix-idiomas' ), 'felix_depoimentos', 'Depoimentos' );
	$add_text( 'felix_depo_title', __( 'Título', 'felix-idiomas' ), 'felix_depoimentos', 'Resultados de quem já vive em inglês' );
	$depo_def = array();
	for ( $i = 1; $i <= 6; $i++ ) {
		$depo_def[ $i ] = array( felix_defaults()[ "felix_depo{$i}_nome" ], felix_defaults()[ "felix_depo{$i}_cargo" ], felix_defaults()[ "felix_depo{$i}_texto" ] );
	}
	for ( $i = 1; $i <= 6; $i++ ) {
		$add_text( "felix_depo{$i}_nome", sprintf( __( 'Depoimento %d - nome (vazio = oculta)', 'felix-idiomas' ), $i ), 'felix_depoimentos', $depo_def[ $i ][0] );
		$add_text( "felix_depo{$i}_cargo", sprintf( __( 'Depoimento %d - cargo', 'felix-idiomas' ), $i ), 'felix_depoimentos', $depo_def[ $i ][1] );
		$add_text( "felix_depo{$i}_texto", sprintf( __( 'Depoimento %d - texto', 'felix-idiomas' ), $i ), 'felix_depoimentos', $depo_def[ $i ][2], 'textarea' );
	}
	$add_text( 'felix_depo_btn', __( 'Texto do botão', 'felix-idiomas' ), 'felix_depoimentos', 'Quero resultados como esses' );

	/* ---- Depoimentos em foto ---- */
	$add_section( 'felix_depofotos', __( '9. Depoimentos em foto (prints)', 'felix-idiomas' ), 55, __( 'Este bloco (carrossel) só aparece no site depois que você enviar pelo menos uma imagem nos campos "Depoimento em foto 1 a 6".', 'felix-idiomas' ) );
	$add_text( 'felix_depofoto_eyebrow', __( 'Etiqueta', 'felix-idiomas' ), 'felix_depofotos', 'Prova real' );
	$add_text( 'felix_depofoto_title', __( 'Título', 'felix-idiomas' ), 'felix_depofotos', 'O que os alunos mandam para a gente' );
	$add_text( 'felix_depofoto_sub', __( 'Subtítulo', 'felix-idiomas' ), 'felix_depofotos', 'Mensagens e conquistas reais de quem destravou o inglês com a Félix Idiomas.', 'textarea' );
	$depofoto_def = array_fill( 0, 6, '' );
	for ( $i = 1; $i <= 6; $i++ ) {
		$wp_customize->add_setting(
			"felix_depofoto{$i}_img",
			array(
				'default'           => $depofoto_def[ $i - 1 ],
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				"felix_depofoto{$i}_img",
				array(
					'label'       => sprintf( __( 'Foto %d', 'felix-idiomas' ), $i ),
					'description' => __( 'Escolha uma imagem da Biblioteca de Mídia. Deixe vazio para remover esta foto.', 'felix-idiomas' ),
					'section'     => 'felix_depofotos',
				)
			)
		);
		$add_text( "felix_depofoto{$i}_cap", sprintf( __( 'Foto %d - legenda', 'felix-idiomas' ), $i ), 'felix_depofotos', '' );
	}
	$add_text( 'felix_depofoto_btn', __( 'Texto do botão', 'felix-idiomas' ), 'felix_depofotos', 'Quero viver isso também' );

	/* ---- Vídeos ---- */
	$add_section( 'felix_videos', __( '10. Vídeos', 'felix-idiomas' ), 60 );
	$add_text( 'felix_video_eyebrow', __( 'Etiqueta', 'felix-idiomas' ), 'felix_videos', 'Vídeos' );
	$add_text( 'felix_video_title', __( 'Título da seção', 'felix-idiomas' ), 'felix_videos', 'Veja o método e os alunos por dentro' );
	$add_text( 'felix_video1_title', __( 'Vídeo 1 - título', 'felix-idiomas' ), 'felix_videos', 'Vídeo institucional' );
	$add_text( 'felix_video1_url', __( 'Vídeo 1 - link do YouTube (vazio = oculta)', 'felix-idiomas' ), 'felix_videos', '', 'url' );
	$add_text( 'felix_video2_title', __( 'Vídeo 2 - título', 'felix-idiomas' ), 'felix_videos', 'Depoimento em vídeo' );
	$add_text( 'felix_video2_url', __( 'Vídeo 2 - link do YouTube (vazio = oculta)', 'felix-idiomas' ), 'felix_videos', '', 'url' );
	$add_text( 'felix_video_btn', __( 'Texto do botão', 'felix-idiomas' ), 'felix_videos', 'Quero começar agora' );

	/* ---- FAQ ---- */
	$add_section( 'felix_faq', __( '11. Perguntas frequentes', 'felix-idiomas' ), 65 );
	$add_text( 'felix_faq_eyebrow', __( 'Etiqueta', 'felix-idiomas' ), 'felix_faq', 'Perguntas frequentes' );
	$add_text( 'felix_faq_title', __( 'Título', 'felix-idiomas' ), 'felix_faq', 'Tudo o que você precisa saber antes do seu “Hello”' );
	$faq_def = array();
	for ( $i = 1; $i <= 6; $i++ ) {
		$faq_def[ $i ] = array( felix_defaults()[ "felix_faq{$i}_q" ], felix_defaults()[ "felix_faq{$i}_a" ] );
	}
	for ( $i = 1; $i <= 6; $i++ ) {
		$add_text( "felix_faq{$i}_q", sprintf( __( 'Pergunta %d (vazio = oculta)', 'felix-idiomas' ), $i ), 'felix_faq', $faq_def[ $i ][0], 'textarea' );
		$add_text( "felix_faq{$i}_a", sprintf( __( 'Resposta %d', 'felix-idiomas' ), $i ), 'felix_faq', $faq_def[ $i ][1], 'textarea' );
	}
	$add_text( 'felix_faq_btn', __( 'Texto do botão', 'felix-idiomas' ), 'felix_faq', 'Ainda tenho dúvidas — quero falar agora' );

	/* ---- Contato ---- */
	$add_section( 'felix_contato', __( '12. Seção de contato e formulário', 'felix-idiomas' ), 70 );
	$add_text( 'felix_contato_eyebrow', __( 'Etiqueta', 'felix-idiomas' ), 'felix_contato', 'Agende agora' );
	$add_text( 'felix_contato_title', __( 'Título', 'felix-idiomas' ), 'felix_contato', 'Sua avaliação de nível é gratuita' );
	$add_text( 'felix_contato_sub', __( 'Subtítulo', 'felix-idiomas' ), 'felix_contato', 'Em 30 minutos, descobrimos onde você está, para onde quer ir e montamos o caminho mais rápido para você chegar lá.', 'textarea' );
	$contato_def = array( 'Aulas online de qualquer lugar do Brasil', 'Professores certificados CELTA/TESOL', 'Materiais premium inclusos', 'Foco em conversação desde o primeiro dia' );
	for ( $i = 1; $i <= 4; $i++ ) {
		$add_text( "felix_contato_item{$i}", sprintf( __( 'Item da lista %d', 'felix-idiomas' ), $i ), 'felix_contato', $contato_def[ $i - 1 ] );
	}
	$add_text( 'felix_contato_btn_agenda', __( 'Texto do botão da agenda', 'felix-idiomas' ), 'felix_contato', 'Agendar pela agenda online' );
	$add_text( 'felix_contato_btn', __( 'Texto do botão do formulário', 'felix-idiomas' ), 'felix_contato', 'Quero abrir novas portas' );
	$add_text( 'felix_form_nome', __( 'Formulário - campo nome', 'felix-idiomas' ), 'felix_contato', 'Nome completo' );
	$add_text( 'felix_form_email', __( 'Formulário - campo e-mail', 'felix-idiomas' ), 'felix_contato', 'E-mail' );
	$add_text( 'felix_form_tel', __( 'Formulário - campo telefone', 'felix-idiomas' ), 'felix_contato', 'WhatsApp com DDD' );
	$add_text( 'felix_form_msg', __( 'Formulário - campo mensagem', 'felix-idiomas' ), 'felix_contato', 'Conte seu objetivo: trabalho no exterior, viagem, home office internacional...' );
	$add_text( 'felix_form_note', __( 'Formulário - aviso abaixo do botão', 'felix-idiomas' ), 'felix_contato', 'Seus dados estão seguros e não serão compartilhados.' );

	/* ---- Rodapé ---- */
	$add_section( 'felix_rodape', __( '13. Rodapé', 'felix-idiomas' ), 80 );
	$add_text( 'felix_footer_about', __( 'Texto da marca no rodapé', 'felix-idiomas' ), 'felix_rodape', 'Inglês de alto nível para quem quer trabalhar, viajar e liderar em qualquer lugar do mundo.', 'textarea' );
	$add_text( 'felix_footer_local', __( 'Cidade / atendimento', 'felix-idiomas' ), 'felix_rodape', 'Goiânia — GO — aulas online para todo o Brasil e exterior' );
	$add_text( 'felix_footer_copy', __( 'Linha de copyright', 'felix-idiomas' ), 'felix_rodape', 'Félix Idiomas. Todos os direitos reservados.' );
}
add_action( 'customize_register', 'felix_customize_register' );
