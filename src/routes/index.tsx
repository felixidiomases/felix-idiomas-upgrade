import { createFileRoute } from "@tanstack/react-router";
import { useState } from "react";
import {
  AGENDA_URL,
  AMANDA_IMAGE,
  EMAIL,
  FAQS,
  HERO_IMAGE,
  METHOD_STEPS,
  NAV_LINKS,
  PACKAGE_OPTIONS,
  PAIN_POINTS,
  PROGRAMS,
  PROOF_SHOTS,
  STATS,
  TESTIMONIALS,
  WHATSAPP_URL,
} from "@/data/site";

export const Route = createFileRoute("/")({
  head: () => ({
    meta: [
      {
        title: "Félix Idiomas | Inglês individual e online para a vida real",
      },
      {
        name: "description",
        content:
          "Aulas de inglês 100% individuais e online, montadas sobre o seu objetivo: entrevistas, viagens, carreira internacional. Agende sua avaliação gratuita.",
      },
      {
        property: "og:title",
        content: "Félix Idiomas | Inglês para usar na sua vida de verdade",
      },
      {
        property: "og:description",
        content:
          "Aulas individuais e online com plano de estudo exclusivo. Avaliação de nível gratuita de 30 minutos.",
      },
      { property: "og:type", content: "website" },
      { property: "og:image", content: HERO_IMAGE },
      { name: "twitter:card", content: "summary_large_image" },
      { name: "twitter:image", content: HERO_IMAGE },
    ],
  }),
  component: Index,
});

function Section({
  id,
  children,
  className = "",
}: {
  id?: string;
  children: React.ReactNode;
  className?: string;
}) {
  return (
    <section id={id} className={`px-5 py-20 md:py-28 ${className}`}>
      <div className="mx-auto w-full max-w-6xl">{children}</div>
    </section>
  );
}

function Header() {
  const [open, setOpen] = useState(false);
  return (
    <header className="sticky top-0 z-50 border-b border-border/60 bg-background/90 backdrop-blur">
      <div className="mx-auto flex w-full max-w-6xl items-center justify-between px-5 py-4">
        <a href="#top" className="font-display text-xl font-bold tracking-tight">
          Félix <span className="text-primary">Idiomas</span>
        </a>
        <nav className="hidden items-center gap-7 lg:flex">
          {NAV_LINKS.map((l) => (
            <a
              key={l.href}
              href={l.href}
              className="text-sm text-muted-foreground transition-colors hover:text-primary"
            >
              {l.label}
            </a>
          ))}
        </nav>
        <div className="flex items-center gap-3">
          <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold hidden md:inline-flex">
            Agendar avaliação
          </a>
          <button
            onClick={() => setOpen(!open)}
            aria-label="Abrir menu"
            className="rounded-md border border-border p-2 lg:hidden"
          >
            <span className="block h-0.5 w-5 bg-current" />
            <span className="mt-1 block h-0.5 w-5 bg-current" />
            <span className="mt-1 block h-0.5 w-5 bg-current" />
          </button>
        </div>
      </div>
      {open && (
        <nav className="flex flex-col gap-1 border-t border-border/60 px-5 pb-4 lg:hidden">
          {NAV_LINKS.map((l) => (
            <a
              key={l.href}
              href={l.href}
              onClick={() => setOpen(false)}
              className="py-2 text-sm text-muted-foreground"
            >
              {l.label}
            </a>
          ))}
          <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold mt-2">
            Agendar avaliação
          </a>
        </nav>
      )}
    </header>
  );
}

function Hero() {
  return (
    <Section id="top" className="pt-14 md:pt-20">
      <div className="grid items-center gap-14 lg:grid-cols-2">
        <div>
          <span className="eyebrow rounded-full border border-primary/50 px-4 py-2">
            Linguagem que conecta mundos
          </span>
          <h1 className="mt-7 text-4xl leading-[1.08] font-bold md:text-6xl">
            Inglês pra usar na sua vida de verdade, não só no caderno.
          </h1>
          <p className="mt-6 max-w-xl text-base leading-relaxed text-muted-foreground">
            Aulas 100% individuais e online, construídas em cima do seu objetivo — seja
            uma entrevista, uma mudança de país, uma viagem ou aquela reunião que você
            vem adiando em inglês.
          </p>
          <div className="mt-9 flex flex-wrap gap-3">
            <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold">
              Agendar avaliação gratuita!
            </a>
            <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-outline">
              Falar no WhatsApp!
            </a>
          </div>
          <div className="mt-12 grid grid-cols-3 gap-6 border-t border-border pt-8">
            {STATS.map((s) => (
              <div key={s.label}>
                <p className="font-display text-2xl font-bold text-primary md:text-3xl">
                  {s.value}
                </p>
                <p className="mt-1 text-[0.7rem] tracking-wider text-muted-foreground uppercase">
                  {s.label}
                </p>
              </div>
            ))}
          </div>
        </div>
        <div className="rounded-3xl border border-primary/25 p-3 shadow-[var(--shadow-soft)]">
          <img
            src={HERO_IMAGE}
            alt="Amanda Félix, fundadora da Félix Idiomas, sentada lendo um livro"
            className="h-full w-full rounded-2xl object-cover"
            loading="eager"
          />
        </div>
      </div>
    </Section>
  );
}

function PainPoints() {
  return (
    <Section className="bg-card/40">
      <h2 className="max-w-3xl text-3xl leading-tight font-bold md:text-4xl">
        Todo mundo trava no mesmo ponto: sair do livro e entrar na vida real.
      </h2>
      <p className="mt-5 max-w-3xl text-muted-foreground">
        Seja para uma carreira global, uma viagem pelo mundo ou um emprego dos sonhos no
        exterior — o problema nunca foi você, foi tentar aprender inglês do jeito de todo
        mundo, quando o seu inglês precisa servir pra sua vida, não pra um livro didático.
      </p>
      <ul className="mt-12 grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        {PAIN_POINTS.map((p) => (
          <li
            key={p}
            className="flex gap-3 rounded-2xl border border-border bg-card p-6 text-sm leading-relaxed text-muted-foreground"
          >
            <span className="text-primary">✕</span>
            {p}
          </li>
        ))}
      </ul>
      <div className="mt-10">
        <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-gold">
          Quero superar essas barreiras
        </a>
      </div>
    </Section>
  );
}

function Programs() {
  return (
    <Section id="programas">
      <span className="eyebrow">Programas</span>
      <h2 className="mt-3 text-3xl leading-tight font-bold md:text-4xl">
        O caminho certo para o seu objetivo
      </h2>
      <p className="mt-4 max-w-2xl text-muted-foreground">
        Empresário, nômade digital, futura vaga internacional ou viajante de alma livre —
        aqui tem um programa que fala a sua língua.
      </p>
      {/* Layout fixo em 2 colunas */}
      <div className="mt-12 grid gap-8 md:grid-cols-2">
        {PROGRAMS.map((p) => (
          <article
            key={p.title}
            className="overflow-hidden rounded-3xl border border-border bg-card shadow-[var(--shadow-soft)]"
          >
            <img
              src={p.image}
              alt={p.title}
              className="h-56 w-full object-cover"
              loading="lazy"
            />
            <div className="p-8">
              <h3 className="text-2xl font-bold">{p.title}</h3>
              <p className="mt-3 text-sm leading-relaxed text-muted-foreground">
                {p.description}
              </p>
              <ul className="mt-6 space-y-2 text-sm">
                {p.features.map((f) => (
                  <li key={f} className="flex gap-2">
                    <span className="text-primary">—</span>
                    <span className="text-muted-foreground">{f}</span>
                  </li>
                ))}
              </ul>
              <a
                href={AGENDA_URL}
                target="_blank"
                rel="noreferrer"
                className="btn-gold mt-8 w-full"
              >
                Agendar avaliação gratuita
              </a>
            </div>
          </article>
        ))}
      </div>
    </Section>
  );
}

function Method() {
  return (
    <Section id="metodo" className="bg-card/40">
      <span className="eyebrow">Metodologia Félix</span>
      <h2 className="mt-3 text-3xl leading-tight font-bold md:text-4xl">
        Do bloqueio à fluência — e da fluência ao seu sonho
      </h2>
      <p className="mt-4 max-w-2xl text-muted-foreground">
        Uma metodologia que respeita a sua história, a sua rotina e o seu objetivo.
      </p>
      <div className="mt-12 grid gap-6 md:grid-cols-3">
        {METHOD_STEPS.map((s) => (
          <div key={s.number} className="rounded-3xl border border-border bg-card p-8">
            <span className="font-display text-4xl font-bold text-primary/40">
              {s.number}
            </span>
            <h3 className="mt-4 text-xl font-bold">{s.title}</h3>
            <p className="mt-3 text-sm leading-relaxed text-muted-foreground">{s.text}</p>
          </div>
        ))}
      </div>
      <div className="mt-10 flex flex-wrap gap-3">
        <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold">
          Começar minha avaliação gratuita
        </a>
        <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-outline">
          Tirar dúvidas no WhatsApp
        </a>
      </div>
    </Section>
  );
}

function About() {
  return (
    <Section id="amanda">
      <div className="grid items-center gap-14 lg:grid-cols-2">
        <div className="rounded-3xl border border-primary/25 p-3 shadow-[var(--shadow-soft)]">
          <img
            src={AMANDA_IMAGE}
            alt="Retrato de Amanda Félix, CEO e fundadora da Félix Idiomas"
            className="w-full rounded-2xl object-cover"
            loading="lazy"
          />
        </div>
        <div>
          <span className="eyebrow">Quem está por trás</span>
          <h2 className="mt-3 text-3xl leading-tight font-bold md:text-4xl">
            Amanda Félix — CEO e fundadora
          </h2>
          <div className="mt-6 space-y-4 text-sm leading-relaxed text-muted-foreground">
            <p>
              Durante anos, acreditei que o inglês era um território reservado a poucos.
              Na escola, o idioma chegava até mim em forma de regra, decoreba e, sobretudo,
              de medo: medo de errar, de falar, de ser julgada.
            </p>
            <p>
              Estudei muito. Minha gramática amadureceu, minha escrita evoluiu. Mas quando
              precisei falar de verdade — fora do Brasil, diante de pessoas reais — eu
              travei. As palavras existiam, só não saíam.
            </p>
            <p>
              A fluência não veio dos livros. Veio da vida: de trabalhar internacionalmente,
              de viver em inglês todos os dias, de construir um relacionamento
              intercultural, de errar, ser corrigida e tentar de novo até acertar.
            </p>
            <p>
              Foi dessa vivência que nasceu a Félix Idiomas. Nosso compromisso é simples:
              poupar você do caminho sofrido e levar direto ao resultado. Você não precisa
              provar que é capaz — precisa apenas dar o primeiro passo.
            </p>
          </div>
          <p className="mt-6 font-display text-lg font-bold">Amanda Félix</p>
          <p className="text-xs tracking-wider text-muted-foreground uppercase">
            CEO e fundadora — Félix Idiomas
          </p>
          <div className="mt-8 flex flex-wrap gap-3">
            <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold">
              Quero dar o meu primeiro passo
            </a>
            <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-outline">
              Falar agora
            </a>
          </div>
        </div>
      </div>
    </Section>
  );
}

function Teachers() {
  return (
    <Section className="bg-card/40">
      <div className="mx-auto max-w-3xl text-center">
        <span className="eyebrow">Sobre os professores</span>
        <h2 className="mt-3 text-3xl leading-tight font-bold md:text-4xl">
          Guias que caminham com você
        </h2>
        <div className="mt-6 space-y-4 text-sm leading-relaxed text-muted-foreground">
          <p>
            Na Félix Idiomas, você pode ter diferentes professores ao longo da jornada — e
            isso é um diferencial planejado, não um acaso.
          </p>
          <p>
            Na vida real, você conversa com pessoas diferentes: sotaques, ritmos e estilos
            distintos. Nossa estrutura prepara você justamente para essa diversidade.
          </p>
          <p>
            Todo o time segue a mesma metodologia personalizada. O professor é o guia que
            acompanha você — e você é o protagonista da própria jornada.
          </p>
        </div>
        <a
          href={AGENDA_URL}
          target="_blank"
          rel="noreferrer"
          className="btn-gold mt-8"
        >
          Agendar minha avaliação gratuita
        </a>
      </div>
    </Section>
  );
}

function Testimonials() {
  return (
    <Section id="resultados">
      <span className="eyebrow">Depoimentos</span>
      <h2 className="mt-3 text-3xl leading-tight font-bold md:text-4xl">
        Resultados de quem já vive em inglês
      </h2>
      <div className="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        {TESTIMONIALS.map((t) => (
          <figure
            key={t.name}
            className="flex flex-col rounded-3xl border border-border bg-card p-7"
          >
            <div className="text-primary">★★★★★</div>
            <blockquote className="mt-4 flex-1 text-sm leading-relaxed text-muted-foreground italic">
              “{t.quote}”
            </blockquote>
            <figcaption className="mt-6 border-t border-border pt-4">
              <p className="font-display font-bold">{t.name}</p>
              <p className="text-xs text-muted-foreground">{t.role}</p>
            </figcaption>
          </figure>
        ))}
      </div>
      <div className="mt-10">
        <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-gold">
          Quero resultados como esses
        </a>
      </div>
    </Section>
  );
}

function ProofShots() {
  const [active, setActive] = useState<string | null>(null);
  const shots = PROOF_SHOTS.slice(0, 10);

  return (
    <Section className="bg-card/40">
      <span className="eyebrow">Prova real</span>
      <h2 className="mt-3 text-3xl leading-tight font-bold md:text-4xl">
        O que os alunos mandam para a gente
      </h2>
      <p className="mt-4 max-w-2xl text-muted-foreground">
        Mensagens e conquistas reais de quem destravou o inglês com a Félix Idiomas.
      </p>

      {/* Galeria de prints: comporta até 10 fotos */}
      <div className="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
        {shots.map((src, i) => (
          <button
            key={src}
            onClick={() => setActive(src)}
            className="group overflow-hidden rounded-2xl border border-border bg-card"
          >
            <img
              src={src}
              alt={`Print de depoimento de aluno ${i + 1}`}
              className="aspect-[3/4] w-full object-cover transition-transform duration-500 group-hover:scale-105"
              loading="lazy"
            />
          </button>
        ))}
        {Array.from({ length: Math.max(0, 10 - shots.length) }).map((_, i) => (
          <div
            key={`slot-${i}`}
            className="flex aspect-[3/4] items-center justify-center rounded-2xl border border-dashed border-border/70 p-3 text-center text-[0.65rem] tracking-wider text-muted-foreground uppercase"
          >
            Espaço para print {shots.length + i + 1}
          </div>
        ))}
      </div>

      {active && (
        <div
          onClick={() => setActive(null)}
          className="fixed inset-0 z-[60] flex items-center justify-center bg-background/95 p-6"
        >
          <img
            src={active}
            alt="Print de depoimento ampliado"
            className="max-h-[85vh] w-auto rounded-2xl border border-border"
          />
        </div>
      )}

      <div className="mt-10">
        <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold">
          Quero viver isso também
        </a>
      </div>
    </Section>
  );
}

function Faq() {
  return (
    <Section id="faq">
      <span className="eyebrow">Perguntas frequentes</span>
      <h2 className="mt-3 text-3xl leading-tight font-bold md:text-4xl">
        Tudo o que você precisa saber antes do seu “Hello”
      </h2>
      <div className="mt-10 divide-y divide-border overflow-hidden rounded-3xl border border-border bg-card">
        {FAQS.map((f) => (
          <details key={f.q} className="group p-6">
            <summary className="flex cursor-pointer list-none items-center justify-between gap-4 font-display text-base font-bold">
              {f.q}
              <span className="text-primary transition-transform group-open:rotate-45">
                +
              </span>
            </summary>
            <p className="mt-3 text-sm leading-relaxed text-muted-foreground">{f.a}</p>
          </details>
        ))}
      </div>
      <div className="mt-10">
        <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-gold">
          Ainda tenho dúvidas — quero falar agora
        </a>
      </div>
    </Section>
  );
}

function Contact() {
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState("");
  const [packageName, setPackageName] = useState(PACKAGE_OPTIONS[0]);
  const [message, setMessage] = useState("");

  const send = (e: React.FormEvent) => {
    e.preventDefault();
    const text = [
      "Olá! Vim pelo site da Félix Idiomas.",
      `Nome: ${name}`,
      `E-mail: ${email}`,
      `WhatsApp: ${phone}`,
      `Pacote de interesse: ${packageName}`,
      message ? `Mensagem: ${message}` : "",
    ]
      .filter(Boolean)
      .join("\n");
    window.open(
      `https://wa.me/556291618508?text=${encodeURIComponent(text)}`,
      "_blank",
    );
  };

  const field =
    "w-full rounded-xl border border-input bg-background px-4 py-3 text-sm outline-none transition-colors focus:border-primary";

  return (
    <Section id="contato" className="bg-card/40">
      <div className="grid gap-14 lg:grid-cols-2">
        <div>
          <span className="eyebrow">Agende agora</span>
          <h2 className="mt-3 text-3xl leading-tight font-bold md:text-4xl">
            Sua avaliação de nível e gratuita!
          </h2>
          <p className="mt-4 text-muted-foreground">
            Em 30 minutos descobrimos onde você está, para onde quer ir e montamos o
            caminho mais rápido para você chegar lá.
          </p>
          <ul className="mt-8 space-y-3 text-sm text-muted-foreground">
            {[
              "Aulas online de qualquer lugar do Brasil",
              "Professores experientes",
              "Conteúdo personalizado",
              "Foco em conversação desde o primeiro dia",
            ].map((i) => (
              <li key={i} className="flex gap-3">
                <span className="text-primary">✓</span>
                {i}
              </li>
            ))}
          </ul>
          <p className="mt-8 text-sm text-muted-foreground">{EMAIL}</p>
          <a
            href={AGENDA_URL}
            target="_blank"
            rel="noreferrer"
            className="btn-outline mt-6"
          >
            Agendar pela agenda online
          </a>
        </div>

        <form
          onSubmit={send}
          className="rounded-3xl border border-border bg-card p-8 shadow-[var(--shadow-soft)]"
        >
          <div className="space-y-4">
            <div>
              <label htmlFor="nome" className="mb-2 block text-xs tracking-wider uppercase">
                Nome
              </label>
              <input
                id="nome"
                required
                value={name}
                onChange={(e) => setName(e.target.value)}
                className={field}
                placeholder="Seu nome completo"
              />
            </div>
            <div className="grid gap-4 sm:grid-cols-2">
              <div>
                <label htmlFor="email" className="mb-2 block text-xs tracking-wider uppercase">
                  E-mail
                </label>
                <input
                  id="email"
                  type="email"
                  required
                  value={email}
                  onChange={(e) => setEmail(e.target.value)}
                  className={field}
                  placeholder="voce@email.com"
                />
              </div>
              <div>
                <label htmlFor="tel" className="mb-2 block text-xs tracking-wider uppercase">
                  WhatsApp
                </label>
                <input
                  id="tel"
                  value={phone}
                  onChange={(e) => setPhone(e.target.value)}
                  className={field}
                  placeholder="(00) 00000-0000"
                />
              </div>
            </div>
            <div>
              <label
                htmlFor="pacote"
                className="mb-2 block text-xs tracking-wider uppercase"
              >
                Pacote de interesse
              </label>
              <input
                id="pacote"
                list="pacotes"
                value={packageName}
                onChange={(e) => setPackageName(e.target.value)}
                className={field}
                placeholder="Escolha ou escreva o nome do pacote"
              />
              <datalist id="pacotes">
                {PACKAGE_OPTIONS.map((o) => (
                  <option key={o} value={o} />
                ))}
              </datalist>
              <p className="mt-2 text-xs text-muted-foreground">
                Você pode escolher uma opção da lista ou digitar outro nome de pacote.
              </p>
            </div>
            <div>
              <label
                htmlFor="mensagem"
                className="mb-2 block text-xs tracking-wider uppercase"
              >
                Mensagem
              </label>
              <textarea
                id="mensagem"
                rows={4}
                value={message}
                onChange={(e) => setMessage(e.target.value)}
                className={field}
                placeholder="Conte seu objetivo com o inglês"
              />
            </div>
            <button type="submit" className="btn-gold w-full">
              Quero abrir novas portas
            </button>
            <p className="text-center text-xs text-muted-foreground">
              Seus dados estão seguros e não serão compartilhados.
            </p>
          </div>
        </form>
      </div>
    </Section>
  );
}

function Footer() {
  return (
    <footer className="border-t border-border px-5 py-10">
      <div className="mx-auto flex w-full max-w-6xl flex-wrap items-center justify-between gap-4">
        <p className="font-display text-lg font-bold">
          Félix <span className="text-primary">Idiomas</span>
        </p>
        <p className="text-xs text-muted-foreground">
          © {new Date().getFullYear()} Félix Idiomas. Todos os direitos reservados.
        </p>
      </div>
    </footer>
  );
}

function Index() {
  return (
    <div className="min-h-screen">
      <Header />
      <main>
        <Hero />
        <PainPoints />
        <Programs />
        <Method />
        <About />
        <Teachers />
        <Testimonials />
        <ProofShots />
        <Faq />
        <Contact />
      </main>
      <Footer />
      <a
        href={WHATSAPP_URL}
        target="_blank"
        rel="noreferrer"
        className="fixed right-5 bottom-5 z-50 inline-flex items-center gap-2 rounded-full bg-[#25D366] px-5 py-3 text-sm font-semibold text-black shadow-lg"
      >
        WhatsApp
      </a>
    </div>
  );
}
