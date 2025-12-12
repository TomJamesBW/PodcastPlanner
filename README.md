# Podcast Planner Tool

A single-page web application for podcast hosts to plan and organize their episodes efficiently.

## Requirements

- Modern web browser (Chrome, Firefox, Safari, Edge)
- **Tablet or larger screen required** - phones are blocked due to resolution limitations
- No installation required - runs directly from HTML file
- No internet connection needed (fully offline capable)

## Basic Functionality

### Episode Planning
- Add and manage hosts, guests, and producers with custom color coding
- Create episode segments with titles, descriptions, key points, and time estimates
- Assign people to specific segments
- Drag-and-drop segment reordering
- Real-time episode calculator (total segments and runtime)

### Data Management
- Automatic local storage persistence
- Export episode plans as TXT, PDF, or JSON
- Import previously saved JSON plans
- Clear all data option

### AI Integration
- Five pre-written prompts for podcast planning assistance
- Quick access buttons for ChatGPT, GitHub Copilot, and Google Gemini
- One-click prompt copying to clipboard

## Instructions for Use

### Getting Started
1. Open `index.html` in any web browser
2. Start by adding episode details (title, number, season) in the **Planner Details** tab
3. Add hosts, guests, or producers with their custom colors
4. Create segments with descriptions, key points, and time estimates
5. Switch to the **Planner** tab to review and organize your episode
6. Export your completed plan using the export buttons

### Managing People
- Click "Add Host", "Add Guest", or "Add Producer"
- Enter name and select a color (optional)
- People appear in both tabs for easy reference
- Remove people by clicking the red Remove button on their card

### Managing Segments
- Fill in segment details (title, description, time)
- Add multiple key points using the Add button
- View all segments in the quick-view list below the form
- Edit segments by clicking Edit in the list
- Assign people to segments in the **Planner** tab
- Reorder segments by dragging them up or down

### Exporting
- **Plain Text (.txt)**: Simple formatted text document
- **PDF**: Print-ready formatted document
- **JPG Image**: High-resolution image export of your episode plan
- **JSON**: Machine-readable format for backup/sharing

## Technical Specifications

### Architecture
- **Type**: Single-Page Application (SPA)
- **Technologies**: HTML5, CSS3, Vanilla JavaScript
- **Dependencies**: html2canvas (CDN for image export)
- **File Size**: ~60KB single file
- **Version**: 1.4

### Data Structure
```javascript
// People array
people = [{
  name: String,
  roles: Array<'host' | 'guest' | 'producer'>,
  color: String (hex)
}]

// Segments array
segments = [{
  title: String,
  description: String,
  time: Number (minutes),
  keyPoints: Array<String>,
  assignedPeople: Array<Person>
}]

// Episode details object
episodeDetails = {
  title: String,
  number: String,
  season: String
}
```

### Storage
- **Method**: localStorage API
- **Key**: `podcastPlannerData`
- **Format**: JSON stringified object
- **Persistence**: Survives browser restarts
- **Capacity**: ~5-10MB (browser dependent)

### Features Implementation

#### Drag and Drop
- HTML5 Drag and Drop API
- Visual feedback during drag operations
- Automatic save after reorder

#### Color Coding
- HTML5 color input type
- CSS custom properties for dynamic theming
- Color preserved in person badges and segment assignments

#### Export Formats
- **TXT**: Blob API with text/plain MIME type
- **PDF**: Window print API with styled HTML
- **JPG**: html2canvas library for high-DPI image generation (3x scale, auto-sized to content)
- **JSON**: Blob API with application/json MIME type

#### Import
- FileReader API for JSON parsing
- Data validation before merge
- Automatic render after import

### Browser Compatibility
- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Opera 76+

### UI Components
- **Tabs**: Custom CSS-based tab navigation
- **Forms**: Native HTML5 form elements with validation
- **Buttons**: Custom styled with CSS gradients
- **Cards**: Flexbox-based responsive layouts
- **Lists**: CSS Grid for people display
- **Modal**: Native confirm/alert dialogs

### Styling
- **Design System**: Custom CSS with CSS variables
- **Colors**: Purple gradient theme (#667eea to #764ba2)
- **Layout**: Flexbox and CSS Grid
- **Responsive**: Adapts to container width
- **Typography**: System font stack (Segoe UI, etc.)

### JavaScript Features
- ES6+ syntax (arrow functions, template literals, spread operator)
- Array methods (map, filter, reduce, forEach)
- Event delegation for dynamic elements
- Modular function organization
- No external libraries or frameworks

### Performance
- Instant load time (single file)
- Real-time updates without page refresh
- Efficient DOM manipulation
- No network requests required
- Minimal memory footprint

### Security
- No external data transmission
- All data stored locally
- No authentication required
- No server-side processing
- Safe for sensitive planning information

## Version History

### Version 1.4 (December 2025)
- Added Settings tab with customization options
- Theme selection: Light, Dark, or System (follows OS preference)
- Color scheme selection with 6 gradient options (Purple, Blue, Green, Orange, Red, Teal)
- Settings persisted in localStorage
- Full dark mode support with CSS variables
- Dynamic theme switching without page reload

### Version 1.3 (December 2025)
- Added "Add Everyone" option to person assignment dropdown
- One-click assignment of all people to a segment
- Automatically prevents duplicate assignments when adding everyone

### Version 1.2 (December 2025)
- Added JPG image export functionality
- High-DPI image generation (3x scale) with auto-sizing to content
- Export includes all visual elements (colors, shapes) without buttons
- Uses html2canvas library from CDN

### Version 1.1 (December 2025)
- Added segment list view in Add Content section with edit/remove functionality
- Added People Involved section in Planner tab
- Added people involved to TXT and PDF exports
- Implemented mobile screen detection (blocks phones, allows tablets/desktop)
- Screen size automatically checked on load and window resize

### Version 1.0 (December 2025)
- Initial release
- Three-tab interface (Planner Details, Planner, Further Help)
- Add and manage hosts, guests, and producers with color coding
- Create and organize episode segments
- Drag-and-drop segment reordering
- Episode calculator with runtime totals
- Export as TXT, PDF, and JSON
- Import from JSON
- localStorage data persistence
- Five AI prompts with copy and quick-access buttons

---

**License**: Open Source  
**Created**: 2025  
**Maintained by**: TJ  
**Contact**: tj@channel84.co.uk
