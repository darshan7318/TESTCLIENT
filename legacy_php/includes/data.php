<?php
/**
 * Trendz Eventz - Verified Business Datasets
 * STRICT CONTENT TRUTH PROTOCOL: Verified facts only. No fabricated statistics or claims.
 */
declare(strict_types=1);

// 1. Verified Core Scale Metrics (Strictly limited to verified statistics)
const SITE_STATS = [
    [
        'number' => '15',
        'suffix' => '+',
        'label' => 'Years Experience',
        'detail' => 'Corporate event & experiential mastery'
    ],
    [
        'number' => '500',
        'suffix' => '+',
        'label' => 'Productions & Activations',
        'detail' => 'Seamless on-ground execution across India'
    ],
    [
        'number' => '50',
        'suffix' => '+',
        'label' => 'MDS Centres Activated',
        'detail' => 'Synchronized metro-wide recruitment drive'
    ],
    [
        'number' => '10',
        'suffix' => '',
        'label' => 'Cities in One Launch',
        'detail' => 'Simultaneous TVS Tyres national product rollout'
    ]
];

// 2. Verified 6-Pillar Core Services
const SERVICES_DATA = [
    [
        'id' => 'corporate-events',
        'name' => 'Corporate Events',
        'tag' => 'Corporate',
        'short_desc' => 'High-stakes corporate gatherings, dealer conferences, and executive milestones executed with uncompromising precision.',
        'full_desc' => 'From 500-dealer national conventions in Goa to 600-strong employee sales meets, we build corporate environments that celebrate achievement, align stakeholders, and reinforce enterprise leadership.',
        'capabilities' => [
            'Dealer meets',
            'Annual meets',
            'Employee engagement',
            'Conferences',
            'Launches'
        ],
        'image' => 'assets/img/work/philips-dealers-meet-1.jpg',
        'case_study_slug' => 'philips-dealers-meet'
    ],
    [
        'id' => 'btl-experiential',
        'name' => 'BTL & Experiential',
        'tag' => 'Experiential',
        'short_desc' => 'High-touch consumer activations, immersive mall setups, and sampling programs that bridge brands with everyday people.',
        'full_desc' => 'We create multi-city on-ground touchpoints that convert casual footfall into loyal brand advocates through interactive games, product sampling, and live experiential engagement.',
        'capabilities' => [
            'Roadshows',
            'Activations',
            'Mall experiences',
            'Sampling programmes',
            'Promotional campaigns'
        ],
        'image' => 'assets/img/work/lipton-mall-engagement-1.jpg',
        'case_study_slug' => 'lipton-mall-engagement'
    ],
    [
        'id' => 'retail-branding',
        'name' => 'Retail Branding',
        'tag' => 'Retail',
        'short_desc' => 'Pan-India visual merchandising, store thematic launches, and high-standard retail audits across hundreds of doors.',
        'full_desc' => 'Delivering consistent brand theater at retail across 100+ stores simultaneously. We oversee fabrication, visual audits, display units, and store launches with flawless consistency.',
        'capabilities' => [
            'Retail audits',
            'Visual merchandising',
            'Store branding',
            'Pan-India rollouts'
        ],
        'image' => 'assets/img/work/samsung-store-launch-1.jpg',
        'case_study_slug' => 'samsung-store-launch'
    ],
    [
        'id' => 'digital-marketing',
        'name' => 'Digital Marketing',
        'tag' => 'Digital',
        'short_desc' => 'Campaign concepts, social-first activation, and digital amplification that expand on-ground events into viral reach.',
        'full_desc' => 'Bridging the physical and digital worlds. We develop integrated communication frameworks and digital content amplification that capture on-ground momentum and extend it across digital channels.',
        'capabilities' => [
            'Campaign concepts',
            'Content amplification',
            'Social-first activation',
            'Integrated communication'
        ],
        'image' => 'assets/img/work/lipton-flash-mob-1.jpg',
        'case_study_slug' => 'lipton-flash-mob'
    ],
    [
        'id' => 'mobile-tele-marketing',
        'name' => 'Mobile & Tele Marketing',
        'tag' => 'Outreach',
        'short_desc' => 'Trained on-ground field forces and direct outreach programs that convert prospect curiosity into qualified participation.',
        'full_desc' => 'Mobilizing dedicated field teams and tele-marketing units to drive high-conversion candidate recruitment, customer registrations, and pre-event invitation follow-ups across metro cities.',
        'capabilities' => [
            'Field force',
            'Tele-marketing',
            'Lead outreach',
            'Activation support'
        ],
        'image' => 'assets/img/work/maruti-driving-school-1.jpg',
        'case_study_slug' => 'maruti-driving-school'
    ],
    [
        'id' => 'broadcast-print-outdoor',
        'name' => 'Broadcast, Print & Outdoor',
        'tag' => 'Outdoor',
        'short_desc' => 'Strategic highway takeovers, toll-naka distribution, print collateral, and guerrilla PR stunts in high-visibility corridors.',
        'full_desc' => 'High-impact outdoor branding campaigns, highway tag distributions run in collaboration with public authorities, print collateral production, and disruptive ambient public stunts.',
        'capabilities' => [
            'Outdoor branding',
            'Broadcast support',
            'Print marketing',
            'PR stunts'
        ],
        'image' => 'assets/img/work/yokohama-road-safety-1.jpg',
        'case_study_slug' => 'yokohama-road-safety'
    ]
];

// 3. Verified Client Case Studies & Production Records
const PROJECTS_DATA = [
    'maruti-driving-school' => [
        'slug' => 'maruti-driving-school',
        'client' => 'Maruti Driving School',
        'client_slug' => 'maruti-driving-school',
        'title' => 'Pan-Metro Driver Recruitment Drive',
        'category' => 'Activations',
        'category_display' => 'Recruitment & Activation',
        'scope_badge' => '~50 MDS Centres',
        'location' => 'Metro Cities',
        'objective' => 'Create widespread awareness of MDS amongst the target demographic, then recruit, onboard, and register candidate drivers.',
        'scope' => 'Deployed dedicated recruitment teams across approximately 50 Maruti Driving School centres in key metro cities across India.',
        'execution_details' => 'End-to-end recruitment drives coordinating localized registration setups, branded information kiosks, candidate evaluation workflows, and real-time onboarding reporting.',
        'verified_metric' => '~50 driving school centres covered',
        'hero_image' => 'assets/img/work/maruti-driving-school-1.jpg',
        'gallery' => [
            'assets/img/work/maruti-driving-school-1.jpg',
            'assets/img/work/maruti-driving-school-2.jpg',
            'assets/img/work/maruti-driving-school-3.jpg'
        ]
    ],
    'samsung-store-launch' => [
        'slug' => 'samsung-store-launch',
        'client' => 'Samsung',
        'client_slug' => 'samsung',
        'title' => '100-Store Thematic Retail Launch',
        'category' => 'Retail',
        'category_display' => 'Retail Launch',
        'scope_badge' => '100 Stores',
        'location' => 'Mumbai, Pune & Bangalore',
        'objective' => 'Give a larger-than-life launch experience to the consumer target group while creating a high feel-good factor and pride for store owners.',
        'scope' => 'Simultaneous thematic retail décor and launch coordination across 100 premium stores in Mumbai, Pune, and Bangalore.',
        'execution_details' => 'Synchronized store transformations featuring custom branded entrance arches, window display dressing, interactive demo zones, and launch day hospitality for dealer partners.',
        'verified_metric' => '100 stores launched with thematic décor',
        'hero_image' => 'assets/img/work/samsung-store-launch-1.jpg',
        'gallery' => [
            'assets/img/work/samsung-store-launch-1.jpg',
            'assets/img/work/samsung-store-launch-2.jpg',
            'assets/img/work/samsung-store-launch-3.jpg'
        ]
    ],
    'tvs-tyres-launch' => [
        'slug' => 'tvs-tyres-launch',
        'client' => 'TVS Tyres',
        'client_slug' => 'tvs-tyres',
        'title' => 'National 10-City Product Launch Tour',
        'category' => 'Launches',
        'category_display' => 'Dealer Launch Tour',
        'scope_badge' => '10 Cities',
        'location' => 'Pan-India',
        'objective' => 'Launch an innovative new tyre range to regional dealer networks and internal sales leadership nationwide.',
        'scope' => 'High-production launch events staged in 10 major commercial hub cities across India on a synchronized tour schedule.',
        'execution_details' => 'Bespoke stage design, dramatic product unveiling mechanisms, audio-visual technical production, and structured dealer interactive sessions executed across all 10 cities.',
        'verified_metric' => '10 cities in the launch tour',
        'hero_image' => 'assets/img/work/tvs-tyres-launch-1.jpg',
        'gallery' => [
            'assets/img/work/tvs-tyres-launch-1.jpg',
            'assets/img/work/tvs-tyres-launch-2.jpg',
            'assets/img/work/tvs-tyres-launch-3.jpg'
        ]
    ],
    'philips-dealers-meet' => [
        'slug' => 'philips-dealers-meet',
        'client' => 'Philips',
        'client_slug' => 'philips',
        'title' => 'National Dealers Meet in Goa',
        'category' => 'Corporate',
        'category_display' => 'Dealer Meet & Celebration',
        'scope_badge' => '~500 Dealers',
        'location' => 'Goa',
        'objective' => 'Celebrate the historic ₹100 Crore sales milestone and host national dealer partners for an executive gala.',
        'scope' => 'Full-scale celebratory convention and hospitality experience in Goa hosting approximately 500 top dealers.',
        'execution_details' => 'Complete event architecture: thematic stage production, executive keynote presentations, awards gala, entertainment choreography, and luxury delegate management.',
        'verified_metric' => '500 dealers hosted in Goa celebrating ₹100 crore sales',
        'hero_image' => 'assets/img/work/philips-dealers-meet-1.jpg',
        'gallery' => [
            'assets/img/work/philips-dealers-meet-1.jpg',
            'assets/img/work/philips-dealers-meet-2.jpg',
            'assets/img/work/philips-dealers-meet-3.jpg'
        ]
    ],
    'lipton-mto-activation' => [
        'slug' => 'lipton-mto-activation',
        'client' => 'Lipton',
        'client_slug' => 'lipton',
        'title' => 'Modern Trade 200-Store Sampling Program',
        'category' => 'Experiential',
        'category_display' => 'Sampling & Modern Trade',
        'scope_badge' => '200 Stores',
        'location' => 'Metro Cities (Hypercity & Big Bazaar)',
        'objective' => 'Sample Lipton Ice Tea directly to shoppers at point of sale to drive trial and immediate basket conversion.',
        'scope' => 'Trained sampling brand ambassadors deployed across 200 Hypercity and Big Bazaar retail hypermarkets.',
        'execution_details' => 'High-standard cold-chain sampling kiosks, branded apparel, product freshness protocols, and live consumer feedback collection across 200 large-format stores.',
        'verified_metric' => '200 stores with sampling teams',
        'hero_image' => 'assets/img/work/lipton-mto-activation-1.jpg',
        'gallery' => [
            'assets/img/work/lipton-mto-activation-1.jpg',
            'assets/img/work/lipton-mto-activation-2.jpg',
            'assets/img/work/lipton-mto-activation-3.jpg'
        ]
    ],
    'lipton-mall-engagement' => [
        'slug' => 'lipton-mall-engagement',
        'client' => 'Lipton',
        'client_slug' => 'lipton',
        'title' => 'In-Mall Experiential Engagement & Games',
        'category' => 'Experiential',
        'category_display' => 'Mall Activation',
        'scope_badge' => 'Multi-Mall Tour',
        'location' => 'Leading Shopping Malls',
        'objective' => 'Engage family and youth demographics in high-traffic shopping atriums through playful interactive branded zones.',
        'scope' => 'Interactive live game arenas and refreshing chilled zones bringing Lipton Ice Tea to life for shoppers.',
        'execution_details' => 'Custom-built experiential pavilions with digital reaction games, instant photo zones, and chilled sampling bars generating active dwell time.',
        'verified_metric' => 'High-dwell interactive mall installations',
        'hero_image' => 'assets/img/work/lipton-mall-engagement-1.jpg',
        'gallery' => [
            'assets/img/work/lipton-mall-engagement-1.jpg',
            'assets/img/work/lipton-mall-engagement-2.jpg',
            'assets/img/work/lipton-mall-engagement-3.jpg'
        ]
    ],
    'lipton-flash-mob' => [
        'slug' => 'lipton-flash-mob',
        'client' => 'Lipton',
        'client_slug' => 'lipton',
        'title' => 'Mall Atrium Flash Mob PR Stunt',
        'category' => 'Activations',
        'category_display' => 'Guerrilla & PR Stunt',
        'scope_badge' => 'High-Footfall Atrium',
        'location' => 'Premier Metro Mall Atrium',
        'objective' => 'Create a surprise high-energy spectacle that draws immediate crowds and sparks organic social conversation around Lipton.',
        'scope' => 'Surprise choreographed guerrilla dance flash mob in a bustling central mall atrium.',
        'execution_details' => 'Disguised performers synchronizing to high-beat music, drawing thousands of spectators to the central atrium, followed by immediate chilled sampling distribution.',
        'verified_metric' => 'High-energy crowd spectacle and viral momentum',
        'hero_image' => 'assets/img/work/lipton-flash-mob-1.jpg',
        'gallery' => [
            'assets/img/work/lipton-flash-mob-1.jpg',
            'assets/img/work/lipton-flash-mob-2.jpg',
            'assets/img/work/lipton-flash-mob-3.jpg'
        ]
    ],
    'yokohama-road-safety' => [
        'slug' => 'yokohama-road-safety',
        'client' => 'Yokohama',
        'client_slug' => 'yokohama',
        'title' => 'Expressway Road Safety Week Activation',
        'category' => 'Activations',
        'category_display' => 'Public Safety & OOH',
        'scope_badge' => 'Expressway Toll Nakas',
        'location' => 'Mumbai–Pune Expressway',
        'objective' => 'Educate motorists on tyre safety and tyre USPs while supporting state road safety awareness.',
        'scope' => 'On-ground tyre tag and safety inspection distribution at toll nakas on the Mumbai-Pune Expressway in official association with the Traffic Police.',
        'execution_details' => 'Collaborated with expressway traffic authorities, deployed safety marshals at toll barriers, distributed safety inspection tags to drivers, and conducted visual tyre audits.',
        'verified_metric' => 'Run with the Traffic Police during Road Safety Week',
        'hero_image' => 'assets/img/work/yokohama-road-safety-1.jpg',
        'gallery' => [
            'assets/img/work/yokohama-road-safety-1.jpg',
            'assets/img/work/yokohama-road-safety-2.jpg',
            'assets/img/work/yokohama-road-safety-3.jpg'
        ]
    ],
    'cadbury-shubh-aarambh' => [
        'slug' => 'cadbury-shubh-aarambh',
        'client' => 'Cadbury',
        'client_slug' => 'cadbury',
        'title' => 'Shubh Aarambh Diwali Mall Activation',
        'category' => 'Experiential',
        'category_display' => 'Festive Mall Activation',
        'scope_badge' => '10 Malls',
        'location' => 'Mumbai & Delhi',
        'objective' => 'Celebrate the Diwali festival with Cadbury by creating joyous sweet-sharing moments across premier retail centers.',
        'scope' => 'Elaborate festive thematic installations and interactive engagement zones across 10 top-tier malls in Mumbai and Delhi.',
        'execution_details' => 'Rich festive gold-and-purple décor, interactive greeting generation, photo moments for families, and festive product gifting touchpoints.',
        'verified_metric' => '10 malls in Mumbai and Delhi',
        'hero_image' => 'assets/img/work/cadbury-shubh-aarambh-1.jpg',
        'gallery' => [
            'assets/img/work/cadbury-shubh-aarambh-1.jpg',
            'assets/img/work/cadbury-shubh-aarambh-2.jpg'
        ]
    ],
    'bombay-dyeing-sales-meet' => [
        'slug' => 'bombay-dyeing-sales-meet',
        'client' => 'Bombay Dyeing',
        'client_slug' => 'bombay-dyeing',
        'title' => 'National Sales Meet & Awards Gala',
        'category' => 'Corporate',
        'category_display' => 'Sales Meet & Felicitations',
        'scope_badge' => '~600 Sales Staff',
        'location' => 'Pan-India Delegates',
        'objective' => 'Felicitate top-performing national sales staff and unveil commercial strategic targets.',
        'scope' => 'Large-scale national corporate sales convention inviting approximately 600 sales staff from all Indian zones.',
        'execution_details' => 'Full production staging, bespoke award trophies, dynamic lighting and audio engineering, executive presentations, and motivational stage experiences.',
        'verified_metric' => '600 sales staff felicitated',
        'hero_image' => 'assets/img/work/bombay-dyeing-sales-meet-1.jpg',
        'gallery' => [
            'assets/img/work/bombay-dyeing-sales-meet-1.jpg',
            'assets/img/work/bombay-dyeing-sales-meet-2.jpg',
            'assets/img/work/bombay-dyeing-sales-meet-3.jpg'
        ]
    ],
    'vitra-annual-meet' => [
        'slug' => 'vitra-annual-meet',
        'client' => 'Vitra',
        'client_slug' => 'vitra',
        'title' => 'Annual General Meeting & Strategy Assembly',
        'category' => 'Corporate',
        'category_display' => 'Corporate AGM',
        'scope_badge' => 'Annual Meet',
        'location' => 'Corporate Convention Center',
        'objective' => 'Conduct the official Annual General Meeting and establish the commercial agenda for the upcoming fiscal year.',
        'scope' => 'Formal corporate gathering delivering high-clarity keynote staging, executive hospitality, and corporate agenda alignment.',
        'execution_details' => 'Sophisticated corporate boardroom-grade AV, synchronized presentation systems, seamless executive delegate registration, and protocol management.',
        'verified_metric' => 'AGM annual meet with agenda for the year ahead',
        'hero_image' => 'assets/img/work/vitra-annual-meet-1.jpg',
        'gallery' => [
            'assets/img/work/vitra-annual-meet-1.jpg',
            'assets/img/work/vitra-annual-meet-2.jpg',
            'assets/img/work/vitra-annual-meet-3.jpg'
        ]
    ],
    'hypercity-branding-relaunch' => [
        'slug' => 'hypercity-branding-relaunch',
        'client' => 'Hypercity',
        'client_slug' => 'hypercity',
        'title' => 'Pan-India Hypermarket Re-Launch & Branding',
        'category' => 'Retail',
        'category_display' => 'Retail Branding & Relaunch',
        'scope_badge' => 'Pan-India',
        'location' => 'National Store Network',
        'objective' => 'Execute comprehensive store branding and customer re-engagement across Hypercity hypermarkets nationwide.',
        'scope' => 'Overhaul of in-store navigation signage, entrance branding, promotional aisle overheads, and grand re-opening customer activations.',
        'execution_details' => 'Simultaneous fabrication and overnight installation across all stores, high-visibility promotional exterior graphics, and re-launch engagement activities.',
        'verified_metric' => 'Store branding rolled out across India',
        'hero_image' => 'assets/img/work/hypercity-branding-relaunch-1.jpg',
        'gallery' => [
            'assets/img/work/hypercity-branding-relaunch-1.jpg',
            'assets/img/work/hypercity-branding-relaunch-2.jpg',
            'assets/img/work/hypercity-branding-relaunch-3.jpg'
        ]
    ],
    'neutrogena-visual-merchandising' => [
        'slug' => 'neutrogena-visual-merchandising',
        'client' => 'Neutrogena',
        'client_slug' => 'neutrogena',
        'title' => 'Premium In-Store Visual Merchandising',
        'category' => 'Retail',
        'category_display' => 'Visual Merchandising',
        'scope_badge' => 'Retail In-Store',
        'location' => 'Beauty & Department Stores',
        'objective' => 'Elevate brand presence and skincare product education through high-end in-store display fixtures and pristine shelf merchandising.',
        'scope' => 'Design, precision fabrication, and installation of illuminated skincare display units and shelf organizers across key retail outlets.',
        'execution_details' => 'Premium acrylic fabrication, crisp LED edge-lit graphics, structured product categorisation trays, and ongoing merchandising maintenance.',
        'verified_metric' => 'Display units and shelf merchandising in store',
        'hero_image' => 'assets/img/work/neutrogena-visual-merchandising-1.jpg',
        'gallery' => [
            'assets/img/work/neutrogena-visual-merchandising-1.jpg',
            'assets/img/work/neutrogena-visual-merchandising-2.jpg',
            'assets/img/work/neutrogena-visual-merchandising-3.jpg'
        ]
    ]
];

// 4. Verified Client Partners (Mapped to their logo files)
const CLIENTS_DATA = [
    [
        'name' => 'Samsung',
        'slug' => 'samsung',
        'logo' => 'assets/img/clients/samsung.png',
        'industry' => 'Consumer Electronics',
        'highlight' => '100-Store Thematic Retail Launch in 3 Cities'
    ],
    [
        'name' => 'Philips',
        'slug' => 'philips',
        'logo' => 'assets/img/clients/philips.png',
        'industry' => 'Lighting & Healthtech',
        'highlight' => '500-Dealer Meet in Goa Celebrating ₹100 Cr'
    ],
    [
        'name' => 'TVS Tyres',
        'slug' => 'tvs-tyres',
        'logo' => 'assets/img/clients/tvs-tyres.png',
        'industry' => 'Automotive & Tyres',
        'highlight' => 'National 10-City Dealer Launch Tour'
    ],
    [
        'name' => 'Lipton',
        'slug' => 'lipton',
        'logo' => 'assets/img/clients/lipton.png',
        'industry' => 'Beverages / FMCG',
        'highlight' => '200-Store Sampling & High-Footfall Mall Activations'
    ],
    [
        'name' => 'Cadbury',
        'slug' => 'cadbury',
        'logo' => 'assets/img/clients/cadbury.png',
        'industry' => 'Confectionery / FMCG',
        'highlight' => 'Shubh Aarambh 10-Mall Festive Tour'
    ],
    [
        'name' => 'Maruti Driving School',
        'slug' => 'maruti-driving-school',
        'logo' => 'assets/img/clients/maruti-driving-school.png',
        'industry' => 'Automotive & Driver Education',
        'highlight' => '~50 Centres Driver Recruitment Drive'
    ],
    [
        'name' => 'Bombay Dyeing',
        'slug' => 'bombay-dyeing',
        'logo' => 'assets/img/clients/bombay-dyeing.png',
        'industry' => 'Textiles & Retail',
        'highlight' => '600 Sales Staff National Sales Felicitations'
    ],
    [
        'name' => 'Vitra',
        'slug' => 'vitra',
        'logo' => 'assets/img/clients/vitra.png',
        'industry' => 'Bathware & Architecture',
        'highlight' => 'Corporate Annual General Meeting'
    ],
    [
        'name' => 'Yamaha',
        'slug' => 'yamaha',
        'logo' => 'assets/img/clients/yamaha.png',
        'industry' => 'Two-Wheelers & Motors',
        'highlight' => 'Experiential Brand Activations'
    ],
    [
        'name' => 'Force Motors',
        'slug' => 'force-motors',
        'logo' => 'assets/img/clients/force-motors.png',
        'industry' => 'Commercial Vehicles',
        'highlight' => 'Commercial Vehicle Brand Activations'
    ],
    [
        'name' => 'MAN Truck',
        'slug' => 'man-truck',
        'logo' => 'assets/img/clients/man-truck.png',
        'industry' => 'Heavy Automotive',
        'highlight' => 'Heavy Vehicle Corporate Showcase'
    ],
    [
        'name' => 'BIG FM',
        'slug' => 'big-fm',
        'logo' => 'assets/img/clients/big-fm.png',
        'industry' => 'Broadcast & Entertainment',
        'highlight' => 'On-Ground Radio Campaign Activations'
    ],
    [
        'name' => 'Radio City',
        'slug' => 'radio-city',
        'logo' => 'assets/img/clients/radio-city.png',
        'industry' => 'Media & Broadcast',
        'highlight' => 'City-Wide Broadcast Event Partnerships'
    ]
];

// 5. Verified 5-Step Operating Workflow (Credentials v2 Deck)
const APPROACH_DATA = [
    [
        'step' => '01',
        'title' => 'Understand',
        'desc' => 'Decode the brief, the brand, the commercial stakes, and the exact audience we need to move.',
        'highlight' => 'In-depth brief alignment'
    ],
    [
        'step' => '02',
        'title' => 'Ideate',
        'desc' => 'Build the overarching concept, spatial creative, scenic stagecraft, and participant experience journey.',
        'highlight' => 'Audacious creative concepts'
    ],
    [
        'step' => '03',
        'title' => 'Plan',
        'desc' => 'Lock locations, vetted vendors, civic permissions, production budgets, and rigorous milestone timelines.',
        'highlight' => 'Bulletproof logistical planning'
    ],
    [
        'step' => '04',
        'title' => 'Execute',
        'desc' => 'Deliver on ground with our own experienced teams, city by city, with zero vendor delegation ambiguity.',
        'highlight' => 'Flawless on-ground discipline'
    ],
    [
        'step' => '05',
        'title' => 'Report',
        'desc' => 'Share comprehensive high-res photography, verified operational numbers, and post-event learnings.',
        'highlight' => 'Transparent post-production audit'
    ]
];

// 6. Leadership & Founder Profile
const FOUNDER_DATA = [
    'name' => 'Bharat Jadhav',
    'title' => 'Founder & Managing Director',
    'statement' => 'Great events do not happen by chance. They happen when audacious creative meets relentless execution discipline.',
    'bio' => 'With over 15 years leading Trendz Eventz, Bharat Jadhav has spearheaded more than 500 high-stakes corporate productions, multi-city dealer tours, and complex retail rollouts across India. Under his leadership, Trendz provides enterprise brands with a single point of accountability from initial ideation to on-ground execution.',
    'signature_image' => 'assets/img/brand/founder-signature.png',
    'location' => 'Mumbai, India'
];

