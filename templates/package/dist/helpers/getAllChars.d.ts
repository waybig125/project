import { Element } from "../types";
/**
 * Get a flattened array of text nodes that have been typed.
 * This excludes any cursor character that might exist.
 */
declare const getAllChars: (element: Element) => any[];
export default getAllChars;
