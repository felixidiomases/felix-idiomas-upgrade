/**
 * Conteúdo espelhado do tema WordPress em wordpress-theme/felix-idiomas/
 * (valores padrão de functions.php + textos publicados em felixidiomas.com).
 */

export const WHATSAPP_PHONE = "556291618508";
export const WHATSAPP_MSG = "Olá! Vim pelo site e gostaria de saber mais.";
export const WHATSAPP_URL = `https://wa.me/${WHATSAPP_PHONE}?text=${encodeURIComponent(WHATSAPP_MSG)}`;
export const AGENDA_URL = "https://calendar.app.google/2qyXrQivS9dsit9A8";
export const EMAIL = "felixidiomases@gmail.com";

export const HERO_IMAGE =
  "https://felixidiomas.com/wp-content/uploads/2026/08/RMM_0681-scaled.jpg";
export const AMANDA_IMAGE =
  "https://felixidiomas.com/wp-content/uploads/2026/08/RMM_0672-2-scaled.jpg";

export const HERO = {
  pill: "Linguagem que conecta mundos",
  title: "Inglês pra usar na sua vida de verdade, não só no caderno.",
  sub: "Aulas 100% individuais e online, construídas em cima do seu objetivo — seja uma entrevista, uma mudança de país, uma viagem ou aquela reunião que você vem adiando em inglês.",
  btn1: "Agendar avaliação gratuita!",
  btn2: "Falar no WhatsApp!",
};

export const STATS = [
  { value: "+13", label: "anos de experiência" },
  { value: "+1367", label: "alunos formados" },
  { value: "100%", label: "de satisfação" },
];

export const DORES = {
  title: "Todo mundo trava no mesmo ponto: sair do livro e entrar na vida real.",
  sub: "Seja para uma carreira global, uma viagem pelo mundo ou um emprego dos sonhos no exterior — o problema nunca foi você, foi tentar aprender inglês do jeito de todo mundo, quando o seu inglês precisa servir pra sua vida, não pra um livro didático.",
  btn: "Quero superar essas barreiras",
  items: [
    "Quer trabalhar no exterior ou para empresas estrangeiras, mas o inglês trava na entrevista",
    "Tem medo de viajar e não conseguir se comunicar sozinho em aeroportos, hotéis e reuniões",
    "Sonha com home office internacional, mas perde oportunidades por não se sentir seguro",
    "Entende algumas palavras, mas trava na hora de falar com naturalidade",
    "Já tentou cursos genéricos e sentiu que nunca sairia do básico",
    "Não tem tempo para turmas fixas e conteúdo que não tem a ver com a sua vida",
  ],
};

export const PROGRAMS_HEAD = {
  eyebrow: "Programas",
  title: "O caminho certo para o seu objetivo",
  sub: "Empresário, nômade digital, futura vaga internacional ou viajante de alma livre — aqui tem um programa que fala a sua língua.",
  btn: "Agendar avaliação gratuita",
};

/** Programas 1 a 3 do tema (Personalizar > 4. Programas). */
export const PROGRAMS = [
  {
    title: "One-to-One Executivo",
    image:
      "https://felixidiomas.com/wp-content/themes/felix-idiomas/assets/img/aula.jpg",
    description:
      "Aulas individuais 100% personalizadas ao seu setor, com professor dedicado e agenda sob medida.",
    features: [
      "Plano de estudo exclusivo",
      "Online e com aulas práticas",
      "Feedback da evolução",
    ],
  },
  {
    title: "In-Company Premium",
    image:
      "https://felixidiomas.com/wp-content/themes/felix-idiomas/assets/img/incompany.jpg",
    description:
      "Treinamento corporativo para times de liderança, com métricas de progresso para o RH.",
    features: [
      "Turmas por nível",
      "Business cases reais",
      "Personalize de acordo com os objetivos da empresa",
    ],
  },
  {
    title: "Inglês para o Mundo",
    image:
      "https://felixidiomas.com/wp-content/themes/felix-idiomas/assets/img/mundo.jpg",
    description:
      "Para quem quer trabalhar no exterior, viajar com liberdade ou conquistar vagas internacionais de home office.",
    features: [
      "Conversação do dia a dia",
      "Entrevistas e apresentações",
      "Cultura e networking global",
    ],
  },
];

export const METODO = {
  eyebrow: "Metodologia Félix",
  title: "Do bloqueio à fluência — e da fluência ao seu sonho",
  sub: "Uma metodologia que respeita a sua história, a sua rotina e o seu objetivo.",
  btn1: "Começar minha avaliação gratuita",
  btn2: "Tirar dúvidas no WhatsApp",
  steps: [
    {
      number: "01",
      title: "Avaliação: onde você está hoje",
      text: "Uma conversa de 30 minutos, sem prova e sem pressão. Escutamos a sua história, identificamos o seu nível real e mapeamos exatamente o que trava a sua fala.",
    },
    {
      number: "02",
      title: "Plano: para onde você quer ir",
      text: "Com o diagnóstico em mãos, desenhamos um plano de estudos 100% personalizado — com temas ligados à sua rotina, à sua profissão e aos seus objetivos.",
    },
    {
      number: "03",
      title: "Jornada: do sonho à realidade",
      text: "Você evolui no seu ritmo, guiado por professores que aplicam a metodologia Félix. Do primeiro “Hello” à fluência que abre as portas que você sempre quis atravessar.",
    },
  ],
};

export const AMANDA = {
  eyebrow: "Quem está por trás",
  title: "Amanda Félix — CEO e fundadora",
  sign: "Amanda Félix",
  role: "CEO e fundadora — Félix Idiomas",
  btn1: "Quero dar o meu primeiro passo",
  btn2: "Falar com a equipe",
  paragraphs: [
    "Durante anos, acreditei que o inglês era um território reservado a poucos. Na escola, o idioma chegava até mim em forma de regra, decoreba e, sobretudo, de medo: medo de errar, de falar, de ser julgada.",
    "Estudei muito. Minha gramática amadureceu, minha escrita evoluiu. Mas, quando precisei falar de verdade — fora do Brasil, diante de pessoas reais —, eu travei. As palavras existiam, só não saíam.",
    "A fluência não veio dos livros. Veio da vida: de trabalhar internacionalmente, de viver em inglês todos os dias, de construir um relacionamento intercultural, de errar, ser corrigida e tentar de novo até acertar.",
    "Foi dessa vivência que nasceu a Félix Idiomas. Nosso compromisso é simples: poupar você do caminho sofrido e levá-lo direto ao resultado. Você não precisa provar que é capaz — precisa apenas dar o primeiro passo. O seu “Hello”.",
  ],
};

/** Galeria de viagens da Amanda — até 8 fotos no tema. */
export const GALERIA = {
  title: "O mundo que o inglês abriu",
  sub: "Alguns dos lugares onde a Amanda viveu, trabalhou e se comunicou em inglês.",
  items: [] as { src: string; caption?: string }[],
};

export const PROFESSORES = {
  eyebrow: "Sobre os professores",
  title: "Guias que caminham com você",
  btn: "Agendar minha avaliação gratuita",
  paragraphs: [
    "Na Félix Idiomas, você pode ter diferentes professores ao longo da jornada — e isso é um diferencial planejado, não um acaso.",
    "Na vida real, você conversa com pessoas diferentes: sotaques, ritmos e estilos distintos. Nossa estrutura prepara você justamente para essa diversidade.",
    "Todo o time segue a mesma metodologia personalizada. O professor é o guia que acompanha você — e você é o protagonista da própria jornada.",
  ],
};

export const DEPOIMENTOS = {
  eyebrow: "Depoimentos",
  title: "Resultados de quem já vive em inglês",
  btn: "Quero resultados como esses",
  items: [
    {
      quote:
        "Em 6 meses, passei a conduzir sozinho as negociações com nossos parceiros alemães. O método é direto ao ponto do meu dia a dia.",
      name: "Ricardo Almeida",
      role: "Empresário",
    },
    {
      quote:
        "Aulas com professor que entende o meu objetivo e vocabulário jurídico. Fechei minha primeira audiência internacional com segurança.",
      name: "Patrícia Menezes",
      role: "Diretora Jurídica",
    },
    {
      quote:
        "O programa in-company elevou o time inteiro. Hoje apresentamos resultados em inglês para o board sem tradutor.",
      name: "Eduardo Tanaka",
      role: "Sócio — Consultoria",
    },
    {
      quote:
        "Consegui minha primeira vaga internacional em home office depois de algumas aulas. A confiança na entrevista fez toda a diferença.",
      name: "Marina Costa",
      role: "Product Manager — remoto para empresa americana",
    },
    {
      quote:
        "Viajei sozinho pela Europa e consegui resolver tudo em inglês. Antes eu nem pedia café. Hoje fecho parcerias em qualquer lugar.",
      name: "Thiago Ribeiro",
      role: "Empresário e nômade digital",
    },
    {
      quote:
        "Estou me preparando para o processo de imigração e já me sinto outra pessoa na fala. O medo de viajar virou animação.",
      name: "Juliana Ferreira",
      role: "Estudante — rumo ao Canadá",
    },
  ],
};

/** Depoimentos em foto (prints) — carrossel; o tema aceita até 6 imagens. */
export const PRINTS = {
  eyebrow: "Prova real",
  title: "O que os alunos mandam para a gente",
  sub: "Mensagens e conquistas reais de quem destravou o inglês com a Félix Idiomas.",
  btn: "Quero viver isso também",
  items: [
    {
      src: "https://felixidiomas.com/wp-content/uploads/2026/08/SaveClip.App_702877302_17949550947152480_3643348566523155375_n.jpg",
      caption: "",
    },
    {
      src: "https://felixidiomas.com/wp-content/uploads/2026/08/SaveClip.App_590481262_17927105841152480_3371498233647692044_n.jpg",
      caption: "",
    },
    {
      src: "https://felixidiomas.com/wp-content/uploads/2026/08/SaveClip.App_587019531_17926674054152480_1865285459831603025_n.jpg",
      caption: "",
    },
  ],
};

/** Vídeos — o tema mostra a seção só quando há link do YouTube. */
export const VIDEOS = {
  eyebrow: "Vídeos",
  title: "Veja o método e os alunos por dentro",
  btn: "Quero começar agora",
  items: [
    { title: "Advanced Vocabulary", url: "" },
    { title: "Practice Class", url: "" },
  ],
};

export const FAQ = {
  eyebrow: "Perguntas frequentes",
  title: "Tudo o que você precisa saber antes do seu “Hello”",
  btn: "Ainda tenho dúvidas — quero falar agora",
  items: [
    {
      q: "Nunca estudei inglês de verdade. Consigo começar do zero?",
      a: "Sim. Boa parte dos nossos alunos chega travada. O plano começa exatamente no ponto em que você está, com foco em comunicação desde a primeira aula.",
    },
    {
      q: "As aulas são online ou presenciais?",
      a: "Atendemos alunos online em todo o Brasil e no exterior e também oferecemos formatos presenciais e in-company para empresas.",
    },
    {
      q: "Quanto tempo leva para eu conseguir me comunicar?",
      a: "Depende do seu ponto de partida e da sua frequência, mas a maioria dos alunos relata segurança para conversas reais entre 2 e 6 meses.",
    },
    {
      q: "Tenho uma agenda muito cheia. Como funciona?",
      a: "Os horários são combinados com você e o plano se ajusta à sua rotina — inclusive para quem viaja com frequência ou trabalha em fusos diferentes.",
    },
    {
      q: "O conteúdo é personalizado mesmo?",
      a: "Sim. Trabalhamos com os temas da sua vida real: entrevistas, reuniões, viagens, atendimento a clientes internacionais ou processo de imigração.",
    },
    {
      q: "Como é a avaliação gratuita?",
      a: "São 30 minutos de conversa, sem prova e sem cobrança. Entendemos seu nível, seus objetivos e apresentamos o caminho recomendado. Sem compromisso.",
    },
  ],
};

export const CONTATO = {
  eyebrow: "Agende agora",
  title: "Sua avaliação de nível e gratuita!",
  sub: "Em 30 minutos descobrimos onde você está, para onde quer ir e montamos o caminho mais rápido para você chegar lá.",
  items: [
    "Aulas online de qualquer lugar do Brasil",
    "Professores experientes",
    "Conteúdo personalizado",
    "Foco em conversação desde o primeiro dia",
  ],
  btnAgenda: "Agendar pela agenda online",
  btnForm: "Quero abrir novas portas",
  formNome: "Nome completo",
  formEmail: "E-mail",
  formTel: "WhatsApp com DDD",
  formMsg:
    "Conte seu objetivo: trabalho no exterior, viagem, home office internacional...",
  formNote: "Seus dados estão seguros e não serão compartilhados.",
};

export const FOOTER = {
  about:
    "Inglês de alto nível para quem quer trabalhar, viajar e liderar em qualquer lugar do mundo.",
  local: "Goiânia — GO — aulas online para todo o Brasil e exterior",
  copy: "Félix Idiomas. Todos os direitos reservados.",
};

export const NAV_LINKS = [
  { label: "Programas", href: "#programas" },
  { label: "Método", href: "#metodo" },
  { label: "Amanda Félix", href: "#amanda" },
  { label: "Resultados", href: "#depoimentos" },
  { label: "FAQ", href: "#faq" },
  { label: "Contato", href: "#contato" },
];
