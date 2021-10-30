import { CURSOR_CLASS, DATA_ATTRIBUTE } from "../contants";
import { Element, Options } from "../types";
import appendStyleBlock from "./appendStyleBlock";

export const cursorFontStyles = {
  "font-family": "",
  "font-weight": "",
  "font-size": "",
  "font-style": "",
  "line-height": "",
  color: "",
  "margin-left": "-.125em",
  "margin-right": ".125em",
} as const;

export const setCursorStyles = (
  id: string,
  options: Options,
  element: Element
) => {
  let rootSelector = `[${DATA_ATTRIBUTE}='${id}']`;
  let cursorSelector = `${rootSelector} .${CURSOR_CLASS}`;
  let computedStyles = getComputedStyle(element);

  let customProperties = Object.entries(cursorFontStyles).reduce(
    (accumulator, [item, value]) => {
      return `${accumulator} ${item}: var(--ti-${item}, ${
        value || computedStyles[item]
      });`;
    },
    ""
  );

  // Set animation styles & custom properties.
  appendStyleBlock(
    `@keyframes blink-${id} { 0% {opacity: 0} 49% {opacity: 0} 50% {opacity: 1} } ${cursorSelector} { display: inline; letter-spacing: -1em; ${customProperties} animation: blink-${id} ${
      options.cursorSpeed / 1000
    }s infinite; } ${cursorSelector}.with-delay { animation-delay: 500ms; } ${cursorSelector}.disabled { animation: none; }`,
    id
  );
};
