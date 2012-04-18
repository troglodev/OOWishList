<h1>GitHub Markup</h1>

<p>We use this library on GitHub when rendering your README or any other
rich text file.</p>

<h2>Markups</h2>

<p>The following markups are supported.  The dependencies listed are required if
you wish to run the library.</p>

<ul>
<li><a href="http://daringfireball.net/projects/markdown/">.markdown</a> -- <code>gem install redcarpet</code> (https://github.com/tanoku/redcarpet)</li>
<li><a href="http://www.textism.com/tools/textile/">.textile</a> -- <code>gem install RedCloth</code></li>
<li><a href="http://rdoc.sourceforge.net/">.rdoc</a> -- <code>gem install rdoc -v 3.6.1</code></li>
<li><a href="http://orgmode.org/">.org</a> -- <code>gem install org-ruby</code></li>
<li><a href="http://wikicreole.org/">.creole</a> -- <code>gem install creole</code></li>
<li><a href="http://www.mediawiki.org/wiki/Help:Formatting">.mediawiki</a> -- <code>gem install wikicloth</code></li>
<li><a href="http://docutils.sourceforge.net/rst.html">.rst</a> -- <code>easy_install docutils</code></li>
<li><a href="http://www.methods.co.nz/asciidoc/">.asciidoc</a> -- <code>brew install asciidoc</code></li>
<li><a href="http://search.cpan.org/dist/perl/pod/perlpod.pod">.pod</a> -- <code>Pod::Simple::HTML</code>
comes with Perl &gt;= 5.10. Lower versions should install Pod::Simple from CPAN.</li>
</ul>

<p>require &#39;github/markup&#39;
GitHub::Markup.render(&#39;README.markdown&#39;, &quot;* One\n* Two&quot;)</p>

<h1>Proyecto Wishlist aplicando Patron MVC y Orientación a Objetos&#39;&#39;&#39;</h1>

<ul>
<li>Creación de varios ficheros a modo de inicio</li>
<li>Diseño de la Clase Wish</li>
</ul>

<hr>

<h2>TODO:&#39;&#39;&#39;</h2>

<p>-Estructura de directorios</p>

<p>Markdown: Syntax ================</p>

<pre><code>Main
Basics
Syntax
License
Dingus
</code></pre>

<ul>
<li><a href="#overview">Overview</a> * <a href="#philosophy">Philosophy</a> * <a href="#html">Inline HTML</a> * <a href="#autoescape">Automatic Escaping for Special Characters</a> * <a href="#block">Block Elements</a> * <a href="#p">Paragraphs and Line Breaks</a> * <a href="#header">Headers</a> * <a href="#blockquote">Blockquotes</a> * <a href="#list">Lists</a> * <a href="#precode">Code Blocks</a> * <a href="#hr">Horizontal Rules</a> * <a href="#span">Span Elements</a> * <a href="#link">Links</a> * <a href="#em">Emphasis</a> * <a href="#code">Code</a> * <a href="#img">Images</a> * <a href="#misc">Miscellaneous</a> * <a href="#backslash">Backslash Escapes</a> * <a href="#autolink">Automatic Links</a> <strong>Note:</strong> This document is itself written using Markdown; you can [see the source for it by adding &#39;.text&#39; to the URL][src]. [src]: /projects/markdown/syntax.text * * *
Overview
Philosophy
Markdown is intended to be as easy-to-read and easy-to-write as is feasible. Readability, however, is emphasized above all else. A Markdown-formatted document should be publishable as-is, as plain text, without looking like it&#39;s been marked up with tags or formatting instructions. While Markdown&#39;s syntax has been influenced by several existing text-to-HTML filters -- including [Setext] [1], [atx] [2], [Textile] [3], [reStructuredText] [4], [Grutatext] [5], and [EtText] [6] -- the single biggest source of inspiration for Markdown&#39;s syntax is the format of plain text email. [1]: http://docutils.sourceforge.net/mirror/setext.html [2]: http://www.aaronsw.com/2002/atx/ [3]: http://textism.com/tools/textile/ [4]: http://docutils.sourceforge.net/rst.html [5]: http://www.triptico.com/software/grutatxt.html [6]: http://ettext.taint.org/doc/ To this end, Markdown&#39;s syntax is comprised entirely of punctuation characters, which punctuation characters have been carefully chosen so as to look like what they mean. E.g., asterisks around a word actually look like *emphasis*. Markdown lists look like, well, lists. Even blockquotes look like quoted passages of text, assuming you&#39;ve ever used email.
Inline HTML
Markdown&#39;s syntax is intended for one purpose: to be used as a format for <em>writing</em> for the web. Markdown is not a replacement for HTML, or even close to it. Its syntax is very small, corresponding only to a very small subset of HTML tags. The idea is <em>not</em> to create a syntax that makes it easier to insert HTML tags. In my opinion, HTML tags are already easy to insert. The idea for Markdown is to make it easy to read, write, and edit prose. HTML is a <em>publishing</em> format; Markdown is a <em>writing</em> format. Thus, Markdown&#39;s formatting syntax only addresses issues that can be conveyed in plain text. For any markup that is not covered by Markdown&#39;s syntax, you simply use HTML itself. There&#39;s no need to preface it or delimit it to indicate that you&#39;re switching from Markdown to HTML; you just use the tags. The only restrictions are that block-level HTML elements -- e.g. <code>
</code>, `<code>,</code></li>
</ul>

<p><code>,</code></p>

<p><code>, etc. -- must be separated from surrounding content by blank lines, and the start and end tags of the block should not be indented with tabs or spaces. Markdown is smart enough not to add extra (unwanted)</code></p>

<p>` tags around HTML block-level tags. For example, to add an HTML table to a Markdown article: This is a regular paragraph.</p>
