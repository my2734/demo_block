import domReady from '@wordpress/dom-ready';
import { render } from '@wordpress/element'

const App = () => <div>React</div>

domReady(function () {
  const container = document.querySelector('#app')
  const observer = new IntersectionObserver(function (entries) {
    if(entries[0]['isIntersecting'] === true){
      if(entries[0]['intersectionRatio']==1){
        console.log('Targer is fully visible in the screen')
      }
    }else{
      console.log("Target is not visible in the screen")
    }
  })

  observer.observe(container)
  // ReactDOM.render(<App />,container)
});

