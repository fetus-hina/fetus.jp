// Ambient type declarations for window globals used in resource/js/*.ts.

interface BootstrapModalOptions {
  backdrop?: boolean | 'static';
  focus?: boolean;
  keyboard?: boolean;
}

interface BootstrapModalInstance {
  show(): void;
  hide(): void;
  toggle(): void;
  dispose(): void;
}

interface BootstrapModalConstructor {
  new (element: Element, options?: BootstrapModalOptions): BootstrapModalInstance;
}

interface BootstrapNamespace {
  Modal: BootstrapModalConstructor;
}

interface TwemojiParseOptions {
  callback?: (icon: string, options: { base: string; size: string; ext: string }) => string | false;
  ext?: string;
  folder?: string;
  base?: string;
  size?: string;
  className?: string;
}

interface TwemojiNamespace {
  parse(node: Node, options?: TwemojiParseOptions): void;
  parse(text: string, options?: TwemojiParseOptions): string;
}

declare const bootstrap: BootstrapNamespace;
declare const twemoji: TwemojiNamespace;

interface Window {
  bootstrap: BootstrapNamespace;
  twemoji: TwemojiNamespace;
  __twitterIntentHandler?: boolean;
}

interface JQuery<TElement = HTMLElement> {
  r18dialog(): this;
  twemoji(): this;
}
