# Podcast Planner Tool

A single-page web application for podcast hosts to plan and organize their episodes efficiently.

## Requirements

- Modern web browser (Chrome, Firefox, Safari, Edge)
- **Tablet or larger screen recommended** - mobile devices supported but not ideal due to complexity
- No installation required - runs directly from HTML file
- No internet connection needed (fully offline capable)

## Basic Functionality

### Episode Planning
- Add and manage hosts, guests, and producers with custom color coding
- Add and manage assets (equipment, locations, etc.) with custom color coding
- Create episode segments with titles, descriptions, key points, and time estimates
- Assign people and assets to specific segments
- Drag-and-drop segment reordering
- Real-time episode calculator (total segments and runtime)

### Live Recording (Go Live)
- Real-time timer with start, stop, and reset controls
- Track recording time for each segment
- Add recording notes for each segment
- View estimated vs actual recording times
- Navigate between segments with Previous/Save & Next
- Auto-save recording data and notes
- Export recording logs with all timing data

### Data Management
- Automatic local storage persistence
- Export episode plans as TXT, PDF, or JSON
- Import previously saved JSON plans
- Clear all data option

### RSS.com Integration
- Upload audio files directly to RSS.com (MP3, M4A, WAV, AAC, OGG, FLAC up to 500MB)
- Create and manage episodes with full metadata support
- View all podcast episodes with status and processing indicators
- Auto-polling for episode processing status
- Optional audio upload - create episodes with or without audio
- Secure local storage of API credentials

### AI Integration
- Five pre-written prompts for podcast planning assistance
- Quick access buttons for ChatGPT, GitHub Copilot, and Google Gemini
- One-click prompt copying to clipboard

### Mobile Support
- Mobile-responsive design with optimized layouts
- Warning screen with option to continue anyway
- Touch-friendly button sizes and spacing
- Collapsible sections to reduce scrolling
- Note: Desktop/tablet recommended for best experience

## Instructions for Use

### Getting Started
1. Open `index.html` in any web browser
2. Start by adding episode details (title, number, season) in the **Planner Details** tab
3. Add hosts, guests, or producers with their custom colors
4. Create segments with descriptions, key points, and time estimates
5. Switch to the **Planner** tab to review and organize your episode
6. (Optional) Configure RSS.com integration in **Settings** to upload episodes
7. Export your completed plan using the export buttons

### Managing Episode Details
- Enter episode title, number, and season in the Planner Details tab
- Set recording date and air date using date pickers
- Details automatically appear on the Planner tab
- Clear all episode details using the Clear Episode Details button

### Managing People
- Click "Add Host", "Add Guest", or "Add Producer"
- Enter name and select a color (optional)
- People appear in both tabs for easy reference
- Remove people by clicking the red Remove button on their card

### Managing Assets
- Enter asset name (e.g., microphone, camera, studio location)
- Select a color for visual identification
- Assets appear in both tabs as "Required Assets"
- Assign assets to segments in the **Planner** tab
- Assets display as colored pills in segment details
- Clear all assets using the Clear Assets button

### Managing Segments
- Fill in segment details (title, description, time)
- Add multiple key points using the Add button
- View all segments in the quick-view list below the form
- Edit segments by clicking Edit in the list
- Assign people to segments in the **Planner** tab
- Reorder segments by dragging them up or down

### Go Live Recording
- Switch to the **Go Live** tab when ready to record
- View current segment details, key points, and assigned people/assets
- Start timer when beginning a segment
- Stop timer when pausing or completing
- Add recording notes specific to each segment
- Use Previous/Save & Next to navigate between segments
- Timer auto-resets when moving to a new segment
- View real-time statistics: estimated time, total time, segments recorded
- Export recording logs with all timing and notes data

### Exporting
- **Plain Text (.txt)**: Simple formatted text document (includes people and assets)
- **PDF**: Print-ready formatted document (includes people and assets)
- **JPG Image**: High-resolution image export of your episode plan (includes people and assets)
- **JSON**: Machine-readable format for backup/sharing (includes all data)
- **Recording Log (.txt)**: Detailed recording session with times and notes (Go Live tab)

## Technical Specifications

### Architecture
- **Type**: Single-Page Application (SPA)
- **Technologies**: HTML5, CSS3, Vanilla JavaScript
- **Dependencies**: html2canvas (CDN for image export)
- **File Size**: ~90KB single file
- **Version**: 1.91

### Data Structure
```javascript
// People array
people = [{
  name: String,
  roles: Array<'host' | 'guest' | 'producer'>,
  color: String (hex)
}]

// Assets array
assets = [{
  name: String,
  color: String (hex)
}]

// Segments array
segments = [{
  title: String,
  description: String,
  time: Number (minutes),
  keyPoints: Array<String>,
  assignedPeople: Array<Person>,
  assignedAssets: Array<Asset>,
  recordingNotes: String,
  recordedTime: Number (seconds),
  isRecorded: Boolean
}]

// Episode details object
episodeDetails = {
  title: String,
  number: String,
  season: String,
  recordingDate: String,
  airDate: String
}

// RSS.com configuration
rssConfig = {
  podcastId: String,
  apiKey: String,
  enabled: Boolean,
  baseUrl: String
}

// RSS.com state
rssState = {
  uploadedAudioId: String,
  currentEpisodeId: String,
  pollingInterval: Number,
  episodes: Array<Object>
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
- **Responsive**: Mobile-optimized with @media queries (768px breakpoint)
- **Typography**: System font stack (Segoe UI, etc.)
- **Collapsible Sections**: Click +/- on any section header to collapse/expand

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

### Version 1.91 (December 2025)
- **RSS.com Integration**: Full API integration for episode management
  - Connect RSS.com account with Podcast ID and API Key
  - Upload audio files (MP3, M4A, WAV, AAC, OGG, FLAC) up to 500MB
  - Create episodes with metadata (title, description, episode/season numbers, explicit flag)
  - Schedule episodes with local-to-UTC datetime conversion
  - View all episodes with status badges (Draft, Scheduled, Published)
  - Real-time processing status with auto-polling every 5 seconds
  - Optional audio upload - episodes can be created without audio
  - Secure local storage of API credentials
- **New RSS Tab**: Conditionally displayed when RSS integration is enabled
- **Settings Updates**: Added RSS.com Integration configuration section
- **CSS Improvements**: Password and datetime-local inputs now match text input styling
- **All previous features retained.**

### Version 1.9 (December 2025)
- **Go Live Save & Next Fix**: Save & Next now saves notes and time, advances segment, and never shows a reset or unsaved notes warning. Only the plain Next button warns about unsaved notes.
- **PDF Export**: Enhanced PDF export with full-width layout and 5% padding on each side for better print results.
- **All previous features retained.**

### Version 1.78 (December 2025)
*See previous releases for details.*

### Version 1.77 (December 2025)
- **Custom Color Scheme**: Create your own gradient color scheme
- Select two colors using color pickers to create custom gradient
- Custom colors saved to settings and persist across sessions
- Preview your custom gradient before applying
- Complements existing 7 preset color schemes

### Version 1.76 (December 2025)
- **Go Live Navigation Improvements**:
- Added "Next" button for navigating segments without saving
- Button layout now: Previous | Next | Save & Next
- Next button allows quick segment preview without committing changes
- Fixed Previous and Next buttons to reset timer without confirmation dialog
- Timer resets smoothly when navigating between segments

### Version 1.75 (December 2025)
- **Mobile Support Added**: App now works on mobile devices
- Mobile warning changed to "not ideal" with Continue Anyway button
- Warning dismissal saved in localStorage
- Comprehensive mobile-responsive CSS with media queries
- Touch-friendly button sizes (44px+ minimum)
- Single-column layouts on mobile devices
- Optimized forms, grids, and navigation for small screens
- **Collapsible Sections**: All sections now have +/- toggle functionality
- Click any section header to collapse/expand content
- Improves navigation and reduces scrolling on all devices
- Collapsible sections work across all 5 tabs
- Clear Assets bug fixed - now updates both tabs immediately

### Version 1.70 (December 2025)
- **Major Feature**: Added "Go Live" recording tab
- Real-time timer with start, pause, stop, and reset functionality
  - **Start**: Begin or resume timer
  - **Pause**: Temporarily pause without saving
  - **Stop**: Pause and save recorded time to segment
  - **Reset**: Clear timer and segment recorded time (requires confirmation)
- Track actual recording time for each segment
- Add recording notes for each segment
- Navigate segments with Previous/Save & Next buttons
- Timer auto-resets when moving between segments
- Live statistics: estimated time, total recorded time, segments recorded/left
  - Segments Recorded and Segments Left boxes centrally aligned below Total Time
  - Estimated Time and Total Segments boxes vertically and horizontally centered
- Display current segment details including people, assets, key points
- **Recorded Time Field Color Coding**:
  - Light green with dark border when under estimated time
  - Light red with dark border when over estimated time
  - Light yellow with dark border when within 10% of estimated time
  - Default gray when no time recorded
- Export recording logs with notes and timing data
- Recording data persisted in localStorage
- Updated segment data structure to include recording information
- JSON import now refreshes all tab displays immediately

### Version 1.66 (December 2025)
- Changed default tab to Planner (instead of Planner Details)
- Export buttons now stack vertically for better organization
- Fixed segment actions alignment (person and asset dropdowns properly aligned)
- Added Collapse All / Expand All button for segments
- Collapsed view shows only segment title, time, and remove button
- Improved segment organization workflow on Planner page

### Version 1.65 (December 2025)
- Added Assets feature with color coding
- Assets section added between People and Content in Planner Details tab
- Assets displayed on Planner tab as "Required Assets"
- Assets assigned to segments as colored pills
- Clear Assets button added
- Clear Episode Details button added
- Assets included in all export formats (TXT, PDF, JPG, JSON)
- Assets persisted in localStorage

### Version 1.6 (December 2025)
- Fixed episode details alignment on Planner page (increased label width to 140px)
- Added Studio:Channel84 custom color scheme (green to magenta gradient)
- Fixed color scheme button functionality
- Dark mode now darkens gradient colors for better aesthetics
- Dark color schemes automatically applied when in dark mode

### Version 1.5 (December 2025)
- Added Recording Date field to episode details
- Added Air Date field to episode details
- Date pickers use HTML5 date input type
- Dates display in formatted long format (e.g., "December 12, 2025")
- Dates included in all export formats (TXT, PDF, JPG)
- Dates persisted in localStorage

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
