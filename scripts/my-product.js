Vue.component('my-product', {
  template: `
  <div>
    <button v-on:click="clickHandler">値下げする</button>{{price}}(円)
  </div>`,
  props: ['price'],
  methods: {
    clickHandler: function () {
      this.$emit('child-click');
    }
  }
})