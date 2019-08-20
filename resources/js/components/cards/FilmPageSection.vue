<template>
  <div class="container" style="margin: 10px 0px">
    <h2 class="title is-5" style="margin: 10px 0px"><slot name="title"></slot></h2>
    <ul>
      <li 
        v-for="(resource, index) in resources" 
        v-bind:key="resource + index" 
      > 
        <span class="tooltip">
          {{resource.name}}
          <div class="tooltiptext">
            <h5 class="title is-6" id="tooltip-heading">{{resource.name}}</h5>
            <ul>
              <li 
                v-for="(property, index) in properties" 
                v-bind:key="property + index + resource.name"
              >
                <span class="has-text-weight-semibold">{{property}}: </span>{{resource[`${property}`]}}
              </li>
            </ul>
          </div>
        </span>
        
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    props: [
      'resources'
    ],
    computed: {
      properties() {
        return Object.keys(this.resources[0]).filter(property => {
          return !(["created_at", "url", "id", "pivot", "updated_at","name"].includes(property));
        })
      }
    }
  }
</script>

<style scoped>
     /* Tooltip container */
  .tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted rgb(0,0,0); /* If you want dots under the hoverable text */
  }

  /* Tooltip text */
  .tooltip .tooltiptext {
    visibility: hidden;
      
    background-color: #555;
    color: rgb(255, 255, 255);
    text-align: left;
    font-size: 13px;
    padding: 10px;
    border-radius: 6px;
    white-space: nowrap;

    /* Position the tooltip text */
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -60px;

    /* Fade in tooltip */
    opacity: 0;
    transition: opacity 0.3s;
  }

  /* Tooltip arrow */
  .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
  }

  /* Show the tooltip text when you mouse over the tooltip container */
  .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
  }

  #tooltip-heading {
    color: rgb(255,255,255);
    margin: 0px 0px 3px 0px;
  } 
</style>