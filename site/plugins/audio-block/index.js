panel.plugin("dennisgrauel/audio-block", {
  blocks: {
    audio: {
      computed: {
        source() {
          return this.content.source[0] || {};
        }
      },
      template: `
        <div>
          <div v-if="source.url">
            <audio controls>
              <source :src="source.url" type="audio/mpeg">
            </audio>
            <p><strong>{{ content.source[0].filename }}</strong></p>
          </div>
          <div v-else>No audio selected</div>
        </div>
      `
    }
  }
});
