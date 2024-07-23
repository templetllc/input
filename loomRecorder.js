import { setup } from "./node_modules/@loomhq/record-sdk";
import { isSupported } from "./node_modules/@loomhq/record-sdk/is-supported";
import { oembed } from "./node_modules/@loomhq/loom-embed";

const PUBLIC_APP_ID = "1b7a0e0e-f09a-4aa9-83b7-aa9daa891789";
const BUTTON_ID = "loom-record-sdk-button";

function insertEmbedPlayer(html) {
  const target = document.getElementById("target");

  if (target) {
    target.innerHTML = html;
  }
}

async function init() {
  const { supported, error } = await isSupported();

  console.log('INIT');

  if (!supported) {
    console.warn(`Error setting up Loom: ${error}`);
    return;
  }

  const root = document.getElementById("app");

  if (!root) {
    return;
  }

  root.innerHTML = `<button id="${BUTTON_ID}">Grabar</button>`;

  const button = document.getElementById(BUTTON_ID);

  if (!button) {
    console.log('No button');
    return;
  }

  const { configureButton } = await setup({
    publicAppId: PUBLIC_APP_ID,
  });

  const sdkButton = configureButton({ element: button });

  sdkButton.on("insert-click", async (video) => {
    const { html } = await oembed(video.sharedUrl, { width: 400 });
    insertEmbedPlayer(html);
  });
}

init();