import { createFileRoute } from "@tanstack/react-router";
import { useState } from "react";
import {
  AGENDA_URL,
  AMANDA,
  AMANDA_IMAGE,
  CONTATO,
  DEPOIMENTOS,
  DORES,
  EMAIL,
  FAQ,
  FOOTER,
  GALERIA,
  HERO,
  HERO_IMAGE,
  METODO,
  NAV_LINKS,
  PRINTS,
  PROFESSORES,
  PROGRAMS,
  PROGRAMS_HEAD,
  STATS,
  VIDEOS,
  WHATSAPP_PHONE,
  WHATSAPP_URL,
} from "@/data/site";

export const Route = createFileRoute("/")({
  head: () => ({
    meta: [
      { title: "Félix Idiomas | Inglês individual e online para a vida real" },
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

/* ---------------- helpers ---------------- */

function Wrap({
  id,
  tone,
  children,
  narrow = false,
}: {
  id?: string;
  tone: "dark" | "darker" | "light";
  children: React.ReactNode;
  narrow?: boolean;
}) {
  const toneClass =
    tone === "dark" ? "fx-dark" : tone === "darker" ? "fx-darker" : "fx-light";
  return (
    <section id={id} className={`${toneClass} px-5 py-20 md:py-28`}>
      <div className={`mx-auto w-full ${narrow ? "max-w-3xl" : "max-w-6xl"}`}>
        {children}
      </div>
    </section>
  );
}

function Muted({
  tone,
  children,
  className = "",
}: {
  tone: "dark" | "light";
  children: React.ReactNode;
  className?: string;
}) {
  return (
    <p
      className={`${tone === "dark" ? "text-ivory-soft" : "text-muted-foreground"} ${className}`}
    >
      {children}
    </p>
  );
}

/* ---------------- sections ---------------- */

function Header() {
  const [open, setOpen] = useState(false);
  return (
    <header className="fx-darker sticky top-0 z-50 border-b border-white/10">
      <div className="mx-auto flex w-full max-w-6xl items-center justify-between px-5 py-4">
        <a href="#topo" className="font-display text-xl font-bold tracking-tight">
          Félix <span className="text-gold">Idiomas</span>
        </a>
        <nav className="hidden items-center gap-7 lg:flex">
          {NAV_LINKS.map((l) => (
            <a
              key={l.href}
              href={l.href}
              className="text-ivory-soft hover:text-gold text-sm transition-colors"
            >
              {l.label}
            </a>
          ))}
        </nav>
        <div className="flex items-center gap-3">
          <a
            href={AGENDA_URL}
            target="_blank"
            rel="noreferrer"
            className="btn-gold hidden md:inline-flex"
          >
            Agendar avaliação
          </a>
          <button
            onClick={() => setOpen(!open)}
            aria-label="Abrir menu"
            className="rounded-md border border-white/25 p-2 lg:hidden"
          >
            <span className="block h-0.5 w-5 bg-current" />
            <span className="mt-1 block h-0.5 w-5 bg-current" />
            <span className="mt-1 block h-0.5 w-5 bg-current" />
          </button>
        </div>
      </div>
      {open && (
        <nav className="flex flex-col gap-1 border-t border-white/10 px-5 pb-4 lg:hidden">
          {NAV_LINKS.map((l) => (
            <a
              key={l.href}
              href={l.href}
              onClick={() => setOpen(false)}
              className="text-ivory-soft py-2 text-sm"
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
    <Wrap id="topo" tone="dark">
      <div className="grid items-center gap-14 lg:grid-cols-2">
        <div>
          <span className="eyebrow border-gold/50 rounded-full border px-4 py-2">
            {HERO.pill}
          </span>
          <h1 className="mt-7 text-4xl leading-[1.08] font-semibold md:text-6xl">
            {HERO.title}
          </h1>
          <Muted tone="dark" className="mt-6 max-w-xl text-base leading-relaxed">
            {HERO.sub}
          </Muted>
          <div className="mt-9 flex flex-wrap gap-3">
            <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold">
              {HERO.btn1}
            </a>
            <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-outline">
              {HERO.btn2}
            </a>
          </div>
          <dl className="mt-12 grid grid-cols-3 gap-6 border-t border-white/15 pt-8">
            {STATS.map((s) => (
              <div key={s.label}>
                <dt className="font-display text-gold text-2xl font-semibold md:text-3xl">
                  {s.value}
                </dt>
                <dd className="text-ivory-soft mt-1 text-[0.7rem] tracking-[0.18em] uppercase">
                  {s.label}
                </dd>
              </div>
            ))}
          </dl>
        </div>
        <div className="border-gold/25 rounded-3xl border p-3 shadow-[var(--shadow-lux)]">
          <img
            src={HERO_IMAGE}
            alt="Amanda Félix, fundadora da Félix Idiomas, lendo um livro"
            className="h-full w-full rounded-2xl object-cover"
          />
        </div>
      </div>
    </Wrap>
  );
}

function Dores() {
  return (
    <Wrap tone="light">
      <div className="mx-auto max-w-3xl text-center">
        <h2 className="text-3xl leading-tight font-semibold md:text-4xl">{DORES.title}</h2>
        <Muted tone="light" className="mt-5">
          {DORES.sub}
        </Muted>
      </div>
      <div className="mt-12 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        {DORES.items.map((d) => (
          <div
            key={d}
            className="border-border bg-card flex gap-3 rounded-2xl border p-6 text-sm leading-relaxed"
          >
            <span className="text-gold">✕</span>
            <span className="text-muted-foreground">{d}</span>
          </div>
        ))}
      </div>
      <div className="mt-10 flex justify-center">
        <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-ghost">
          {DORES.btn}
        </a>
      </div>
    </Wrap>
  );
}

function Programas() {
  return (
    <Wrap id="programas" tone="dark">
      <div className="text-center">
        <p className="eyebrow">{PROGRAMS_HEAD.eyebrow}</p>
        <h2 className="mt-3 text-3xl leading-tight font-semibold md:text-4xl">
          {PROGRAMS_HEAD.title}
        </h2>
        <Muted tone="dark" className="mx-auto mt-4 max-w-2xl">
          {PROGRAMS_HEAD.sub}
        </Muted>
      </div>
      <div className="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        {PROGRAMS.map((p) => (
          <article
            key={p.title}
            className="overflow-hidden rounded-3xl border border-white/12 bg-white/[0.04] shadow-[var(--shadow-lux)]"
          >
            <img src={p.image} alt={p.title} className="h-52 w-full object-cover" loading="lazy" />
            <div className="p-7">
              <h3 className="text-2xl font-semibold">{p.title}</h3>
              <Muted tone="dark" className="mt-3 text-sm leading-relaxed">
                {p.description}
              </Muted>
              <ul className="mt-6 space-y-2 text-sm">
                {p.features.map((f) => (
                  <li key={f} className="flex gap-2">
                    <span className="text-gold">—</span>
                    <span className="text-ivory-soft">{f}</span>
                  </li>
                ))}
              </ul>
              <a
                href={AGENDA_URL}
                target="_blank"
                rel="noreferrer"
                className="btn-ghost mt-7 w-full"
              >
                {PROGRAMS_HEAD.btn}
              </a>
            </div>
          </article>
        ))}
      </div>
    </Wrap>
  );
}

function Metodo() {
  return (
    <Wrap id="metodo" tone="light">
      <div className="text-center">
        <p className="eyebrow">{METODO.eyebrow}</p>
        <h2 className="mt-3 text-3xl leading-tight font-semibold md:text-4xl">
          {METODO.title}
        </h2>
        <Muted tone="light" className="mx-auto mt-4 max-w-2xl">
          {METODO.sub}
        </Muted>
      </div>
      <div className="mt-12 grid gap-6 md:grid-cols-3">
        {METODO.steps.map((s) => (
          <div key={s.number} className="border-border bg-card rounded-3xl border p-8">
            <span className="font-display text-gold/60 text-4xl font-semibold">
              {s.number}
            </span>
            <h3 className="mt-4 text-xl font-semibold">{s.title}</h3>
            <Muted tone="light" className="mt-3 text-sm leading-relaxed">
              {s.text}
            </Muted>
          </div>
        ))}
      </div>
      <div className="mt-10 flex flex-wrap justify-center gap-3">
        <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold">
          {METODO.btn1}
        </a>
        <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-ghost">
          {METODO.btn2}
        </a>
      </div>
    </Wrap>
  );
}

function Amanda() {
  return (
    <Wrap id="amanda" tone="dark">
      <div className="grid items-center gap-14 lg:grid-cols-2">
        <div className="border-gold/25 rounded-3xl border p-3 shadow-[var(--shadow-lux)]">
          <img
            src={AMANDA_IMAGE}
            alt="Retrato de Amanda Félix, CEO e fundadora da Félix Idiomas"
            className="w-full rounded-2xl object-cover"
            loading="lazy"
          />
        </div>
        <div>
          <p className="eyebrow">{AMANDA.eyebrow}</p>
          <h2 className="mt-3 text-3xl leading-tight font-semibold md:text-4xl">
            {AMANDA.title}
          </h2>
          <div className="mt-6 space-y-4">
            {AMANDA.paragraphs.map((p) => (
              <Muted key={p} tone="dark" className="text-sm leading-relaxed">
                {p}
              </Muted>
            ))}
          </div>
          <p className="font-display mt-6 text-lg font-semibold">{AMANDA.sign}</p>
          <p className="text-ivory-soft text-xs tracking-[0.18em] uppercase">
            {AMANDA.role}
          </p>
          <div className="mt-8 flex flex-wrap gap-3">
            <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold">
              {AMANDA.btn1}
            </a>
            <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-outline">
              {AMANDA.btn2}
            </a>
          </div>
        </div>
      </div>

      {GALERIA.items.length > 0 && (
        <div className="mt-20">
          <div className="text-center">
            <h3 className="font-display text-2xl font-semibold">{GALERIA.title}</h3>
            <Muted tone="dark" className="mx-auto mt-3 max-w-2xl text-sm">
              {GALERIA.sub}
            </Muted>
          </div>
          <div className="mt-8 flex snap-x gap-4 overflow-x-auto pb-3">
            {GALERIA.items.map((g) => (
              <figure key={g.src} className="w-64 shrink-0 snap-start">
                <img
                  src={g.src}
                  alt={g.caption || "Viagem"}
                  className="h-72 w-full rounded-2xl object-cover"
                  loading="lazy"
                />
                {g.caption && (
                  <figcaption className="text-ivory-soft mt-2 text-xs">
                    {g.caption}
                  </figcaption>
                )}
              </figure>
            ))}
          </div>
        </div>
      )}
    </Wrap>
  );
}

function Professores() {
  return (
    <Wrap tone="light" narrow>
      <div className="text-center">
        <p className="eyebrow">{PROFESSORES.eyebrow}</p>
        <h2 className="mt-3 text-3xl leading-tight font-semibold md:text-4xl">
          {PROFESSORES.title}
        </h2>
        <div className="mt-6 space-y-4">
          {PROFESSORES.paragraphs.map((p) => (
            <Muted key={p} tone="light" className="text-sm leading-relaxed">
              {p}
            </Muted>
          ))}
        </div>
        <a
          href={AGENDA_URL}
          target="_blank"
          rel="noreferrer"
          className="btn-gold mt-8"
        >
          {PROFESSORES.btn}
        </a>
      </div>
    </Wrap>
  );
}

function Depoimentos() {
  return (
    <Wrap id="depoimentos" tone="dark">
      <div className="text-center">
        <p className="eyebrow">{DEPOIMENTOS.eyebrow}</p>
        <h2 className="mt-3 text-3xl leading-tight font-semibold md:text-4xl">
          {DEPOIMENTOS.title}
        </h2>
      </div>
      <div className="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        {DEPOIMENTOS.items.map((t) => (
          <figure
            key={t.name}
            className="flex flex-col rounded-3xl border border-white/12 bg-white/[0.04] p-7"
          >
            <div className="text-gold">★★★★★</div>
            <blockquote className="text-ivory-soft mt-4 flex-1 text-sm leading-relaxed italic">
              “{t.quote}”
            </blockquote>
            <figcaption className="mt-6 border-t border-white/12 pt-4">
              <strong className="font-display block font-semibold">{t.name}</strong>
              <span className="text-ivory-soft text-xs">{t.role}</span>
            </figcaption>
          </figure>
        ))}
      </div>
      <div className="mt-10 flex justify-center">
        <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-ghost">
          {DEPOIMENTOS.btn}
        </a>
      </div>
    </Wrap>
  );
}

function Prints() {
  const [active, setActive] = useState<string | null>(null);
  if (PRINTS.items.length === 0) return null;

  return (
    <Wrap id="depoimentos-fotos" tone="light">
      <div className="text-center">
        <p className="eyebrow">{PRINTS.eyebrow}</p>
        <h2 className="mt-3 text-3xl leading-tight font-semibold md:text-4xl">
          {PRINTS.title}
        </h2>
        <Muted tone="light" className="mx-auto mt-4 max-w-2xl">
          {PRINTS.sub}
        </Muted>
      </div>

      <div className="mt-12 flex snap-x gap-5 overflow-x-auto pb-4">
        {PRINTS.items.map((d, i) => (
          <figure key={d.src} className="w-64 shrink-0 snap-start">
            <button
              onClick={() => setActive(d.src)}
              className="border-border bg-card block w-full overflow-hidden rounded-2xl border"
            >
              <img
                src={d.src}
                alt={d.caption || `Depoimento de aluno ${i + 1}`}
                className="aspect-[3/4] w-full object-cover"
                loading="lazy"
              />
            </button>
            {d.caption && (
              <figcaption className="text-muted-foreground mt-2 text-xs">
                {d.caption}
              </figcaption>
            )}
          </figure>
        ))}
      </div>

      {active && (
        <div
          onClick={() => setActive(null)}
          className="fixed inset-0 z-[60] flex items-center justify-center bg-black/85 p-6"
        >
          <img
            src={active}
            alt="Print de depoimento ampliado"
            className="max-h-[85vh] w-auto rounded-2xl"
          />
        </div>
      )}

      <div className="mt-8 flex justify-center">
        <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold">
          {PRINTS.btn}
        </a>
      </div>
    </Wrap>
  );
}

function Videos() {
  const items = VIDEOS.items.filter((v) => v.url);
  if (items.length === 0) return null;
  return (
    <Wrap id="videos" tone="darker">
      <div className="text-center">
        <p className="eyebrow">{VIDEOS.eyebrow}</p>
        <h2 className="mt-3 text-3xl leading-tight font-semibold md:text-4xl">
          {VIDEOS.title}
        </h2>
      </div>
      <div className="mt-12 grid gap-8 md:grid-cols-2">
        {items.map((v) => (
          <div key={v.title}>
            <div className="aspect-video overflow-hidden rounded-2xl border border-white/12">
              <iframe
                src={v.url}
                title={v.title}
                loading="lazy"
                allowFullScreen
                className="h-full w-full"
              />
            </div>
            <p className="text-ivory-soft mt-3 text-sm">{v.title}</p>
          </div>
        ))}
      </div>
      <div className="mt-10 flex justify-center">
        <a href={AGENDA_URL} target="_blank" rel="noreferrer" className="btn-gold">
          {VIDEOS.btn}
        </a>
      </div>
    </Wrap>
  );
}

function Faq() {
  return (
    <Wrap id="faq" tone="dark" narrow>
      <div className="text-center">
        <p className="eyebrow">{FAQ.eyebrow}</p>
        <h2 className="mt-3 text-3xl leading-tight font-semibold md:text-4xl">
          {FAQ.title}
        </h2>
      </div>
      <div className="mt-10 divide-y divide-white/12 overflow-hidden rounded-3xl border border-white/12 bg-white/[0.04]">
        {FAQ.items.map((f) => (
          <details key={f.q} className="group p-6">
            <summary className="font-display flex cursor-pointer list-none items-center justify-between gap-4 text-base font-semibold">
              {f.q}
              <span className="text-gold transition-transform group-open:rotate-45">+</span>
            </summary>
            <p className="text-ivory-soft mt-3 text-sm leading-relaxed">{f.a}</p>
          </details>
        ))}
      </div>
      <div className="mt-10 flex justify-center">
        <a href={WHATSAPP_URL} target="_blank" rel="noreferrer" className="btn-gold">
          {FAQ.btn}
        </a>
      </div>
    </Wrap>
  );
}

function Contato() {
  const [nome, setNome] = useState("");
  const [email, setEmail] = useState("");
  const [tel, setTel] = useState("");
  const [programa, setPrograma] = useState(PROGRAMS[0].title);
  const [mensagem, setMensagem] = useState("");

  const enviar = (e: React.FormEvent) => {
    e.preventDefault();
    const texto = [
      "Olá! Vim pelo site da Félix Idiomas.",
      `Nome: ${nome}`,
      `E-mail: ${email}`,
      `WhatsApp: ${tel}`,
      `Programa de interesse: ${programa}`,
      mensagem ? `Mensagem: ${mensagem}` : "",
    ]
      .filter(Boolean)
      .join("\n");
    window.open(
      `https://wa.me/${WHATSAPP_PHONE}?text=${encodeURIComponent(texto)}`,
      "_blank",
    );
  };

  const field =
    "w-full rounded-xl border border-white/20 bg-white/[0.04] px-4 py-3 text-sm text-ivory placeholder:text-ivory-soft/60 outline-none transition-colors focus:border-gold";

  return (
    <Wrap id="contato" tone="darker">
      <div className="grid gap-14 lg:grid-cols-2">
        <div>
          <p className="eyebrow">{CONTATO.eyebrow}</p>
          <h2 className="mt-3 text-3xl leading-tight font-semibold md:text-4xl">
            {CONTATO.title}
          </h2>
          <Muted tone="dark" className="mt-4">
            {CONTATO.sub}
          </Muted>
          <ul className="mt-8 space-y-3 text-sm">
            {CONTATO.items.map((i) => (
              <li key={i} className="flex gap-3">
                <span className="text-gold">✓</span>
                <span className="text-ivory-soft">{i}</span>
              </li>
            ))}
          </ul>
          <div className="my-8 h-px bg-white/15" />
          <p className="text-ivory-soft text-sm">{EMAIL}</p>
          <a
            href={AGENDA_URL}
            target="_blank"
            rel="noreferrer"
            className="btn-ghost mt-6"
          >
            {CONTATO.btnAgenda}
          </a>
        </div>

        <form
          onSubmit={enviar}
          className="space-y-4 rounded-3xl border border-white/12 bg-white/[0.04] p-8"
        >
          <input
            required
            value={nome}
            onChange={(e) => setNome(e.target.value)}
            className={field}
            placeholder={CONTATO.formNome}
            aria-label={CONTATO.formNome}
          />
          <input
            required
            type="email"
            value={email}
            onChange={(e) => setEmail(e.target.value)}
            className={field}
            placeholder={CONTATO.formEmail}
            aria-label={CONTATO.formEmail}
          />
          <input
            required
            type="tel"
            value={tel}
            onChange={(e) => setTel(e.target.value)}
            className={field}
            placeholder={CONTATO.formTel}
            aria-label={CONTATO.formTel}
          />
          <select
            value={programa}
            onChange={(e) => setPrograma(e.target.value)}
            className={field}
            aria-label="Programa de interesse"
          >
            {PROGRAMS.map((p) => (
              <option key={p.title} value={p.title} className="text-charcoal">
                {p.title}
              </option>
            ))}
          </select>
          <textarea
            rows={4}
            value={mensagem}
            onChange={(e) => setMensagem(e.target.value)}
            className={field}
            placeholder={CONTATO.formMsg}
            aria-label="Mensagem"
          />
          <button type="submit" className="btn-gold w-full">
            {CONTATO.btnForm}
          </button>
          <p className="text-ivory-soft/70 text-center text-xs">{CONTATO.formNote}</p>
        </form>
      </div>
    </Wrap>
  );
}

function Footer() {
  return (
    <footer className="fx-dark border-t border-white/10 px-5 py-12">
      <div className="mx-auto grid w-full max-w-6xl gap-6 md:grid-cols-2">
        <div>
          <p className="font-display text-lg font-semibold">
            Félix <span className="text-gold">Idiomas</span>
          </p>
          <p className="text-ivory-soft mt-2 max-w-sm text-sm">{FOOTER.about}</p>
        </div>
        <div className="md:text-right">
          <p className="text-ivory-soft text-sm">{FOOTER.local}</p>
          <p className="text-ivory-soft/70 mt-2 text-xs">
            © {new Date().getFullYear()} {FOOTER.copy}
          </p>
        </div>
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
        <Dores />
        <Programas />
        <Metodo />
        <Amanda />
        <Professores />
        <Depoimentos />
        <Prints />
        <Videos />
        <Faq />
        <Contato />
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
