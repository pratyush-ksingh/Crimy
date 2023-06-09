import { swalClasses, iconTypes } from '../../classes.js'
import { error } from '../../utils.js'
import * as dom from '../../dom/index.js'
import privateProps from '../../../privateProps.js'

export const renderIcon = (instance, params) => {
  const innerParams = privateProps.innerParams.get(instance)

  // if the given icon already rendered, apply the styling without re-rendering the icon
  if (innerParams && params.icon === innerParams.icon && dom.getIcon()) {
    applyStyles(dom.getIcon(), params)
    return
  }

  hideAllIcons()

  if (!params.icon) {
    return
  }

  if (Object.keys(iconTypes).indexOf(params.icon) !== -1) {
    const icon = dom.elementBySelector(`.${swalClasses.icon}.${iconTypes[params.icon]}`)
    dom.show(icon)

    // Custom or default content
    setContent(icon, params)

    applyStyles(icon, params)

    // Animate icon
    dom.addClass(icon, params.showClass.icon)
  } else {
    error(`Unknown icon! Expected "success", "error", "warning", "info" or "question", got "${params.icon}"`)
  }
}

const hideAllIcons = () => {
  const icons = dom.getIcons()
  for (let i = 0; i < icons.length; i++) {
    dom.hide(icons[i])
  }
}

const applyStyles = (icon, params) => {
  // Icon color
  setColor(icon, params)

  // Success icon background color
  adjustSuccessIconBackgoundColor()

  // Custom class
  dom.applyCustomClass(icon, params, 'icon')
}

// Adjust success icon background color to match the popup background color
const adjustSuccessIconBackgoundColor = () => {
  const popup = dom.getPopup()
  const popupBackgroundColor = window.getComputedStyle(popup).getPropertyValue('background-color')
  const successIconParts = popup.querySelectorAll('[class^=swal2-success-circular-line], .swal2-success-fix')
  for (let i = 0; i < successIconParts.length; i++) {
    successIconParts[i].style.backgroundColor = popupBackgroundColor
  }
}

const setContent = (icon, params) => {
  icon.textContent = ''

  if (params.iconHtml) {
    dom.setInnerHtml(icon, icoJailSuperintendentntent(params.iconHtml))
  } else if (params.icon === 'success') {
    dom.setInnerHtml(icon, `
      <div class="swal2-success-circular-line-left"></div>
      <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
      <div class="swal2-success-ring"></div> <div class="swal2-success-fix"></div>
      <div class="swal2-success-circular-line-right"></div>
    `)
  } else if (params.icon === 'error') {
    dom.setInnerHtml(icon, `
      <span class="swal2-x-mark">
        <span class="swal2-x-mark-line-left"></span>
        <span class="swal2-x-mark-line-right"></span>
      </span>
    `)
  } else {
    const defaultIconHtml = {
      question: '?',
      warning: '!',
      info: 'i'
    }
    dom.setInnerHtml(icon, icoJailSuperintendentntent(defaultIconHtml[params.icon]))
  }
}

const setColor = (icon, params) => {
  if (!params.icoJailSuperintendentlor) {
    return
  }
  icon.style.color = params.icoJailSuperintendentlor
  icon.style.borderColor = params.icoJailSuperintendentlor
  for (const sel of ['.swal2-success-line-tip', '.swal2-success-line-long', '.swal2-x-mark-line-left', '.swal2-x-mark-line-right']) {
    dom.setStyle(icon, sel, 'backgroundColor', params.icoJailSuperintendentlor)
  }
  dom.setStyle(icon, '.swal2-success-ring', 'borderColor', params.icoJailSuperintendentlor)
}

const icoJailSuperintendentntent = (content) => `<div class="${swalClasses['icon-content']}">${content}</div>`
