/**
 * Opener sculpture: four glass slabs, one per layer of what Cloudence builds
 * (foundations, protection, software, people), stacked around an ember core.
 * The stack opens up as the visitor scrolls the opener; it drifts with the
 * pointer; it freezes under prefers-reduced-motion and pauses off-screen.
 */
import { Canvas, useFrame, useThree } from '@react-three/fiber';
import { Environment, Lightformer, MeshTransmissionMaterial, RoundedBox, Float } from '@react-three/drei';
import { useEffect, useMemo, useRef, useState } from 'react';
import * as THREE from 'three';

const LAYERS = [
  { y: -1.5, size: [3.6, 0.22, 2.6], tint: '#ffffff' },
  { y: -0.5, size: [3.2, 0.22, 2.3], tint: '#fff4ec' },
  { y: 0.5,  size: [2.8, 0.22, 2.0], tint: '#ffffff' },
  { y: 1.5,  size: [2.4, 0.22, 1.7], tint: '#fff4ec' },
];

function Stack({ reduceMotion, quality }) {
  const group = useRef(null);
  const slabs = useRef([]);
  const core = useRef(null);
  const { pointer } = useThree();
  const scroll = useRef(0);

  useEffect(() => {
    const onScroll = () => { scroll.current = Math.min(1, Math.max(0, window.scrollY / (window.innerHeight * 0.9))); };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => window.removeEventListener('scroll', onScroll);
  }, []);

  useFrame((state, delta) => {
    if (!group.current) return;
    const t = state.clock.elapsedTime;
    const p = reduceMotion ? 0 : scroll.current;
    const ease = p * p * (3 - 2 * p);
    group.current.rotation.y = THREE.MathUtils.damp(group.current.rotation.y, 0.55 + pointer.x * 0.25 + (reduceMotion ? 0 : t * 0.06), 2, delta);
    group.current.rotation.x = THREE.MathUtils.damp(group.current.rotation.x, 0.32 - pointer.y * 0.12, 2, delta);
    slabs.current.forEach((m, i) => {
      if (!m) return;
      const base = LAYERS[i].y;
      m.position.y = THREE.MathUtils.damp(m.position.y, base * (1 + ease * 1.25), 3, delta);
      m.rotation.y = THREE.MathUtils.damp(m.rotation.y, ease * (i - 1.5) * 0.22, 3, delta);
    });
    if (core.current) {
      core.current.rotation.x = t * 0.4;
      core.current.rotation.z = t * 0.25;
      const s = 1 + Math.sin(t * 1.4) * 0.05;
      core.current.scale.setScalar(s);
    }
  });

  return (
    <group ref={group} position={quality === 'high' ? [0.55, -0.4, 0] : [0.2, -0.2, 0]} rotation={[0.32, 0.55, 0]} scale={quality === 'high' ? 0.8 : 0.62}>
      {LAYERS.map((l, i) => (
        <RoundedBox key={i} ref={(el) => (slabs.current[i] = el)} args={l.size} radius={0.08} smoothness={4} position={[0, l.y, 0]}>
          <MeshTransmissionMaterial
            samples={quality === 'high' ? 6 : 3}
            resolution={quality === 'high' ? 512 : 256}
            transmission={1}
            thickness={0.6}
            roughness={0.12}
            ior={1.45}
            chromaticAberration={0.035}
            anisotropy={0.15}
            distortion={0.15}
            distortionScale={0.4}
            temporalDistortion={0.05}
            color={l.tint}
            background={new THREE.Color('#fbfaf7')}
          />
        </RoundedBox>
      ))}
      <mesh ref={core}>
        <torusKnotGeometry args={[0.42, 0.14, 128, 24]} />
        <meshStandardMaterial color="#f08033" emissive="#d9641c" emissiveIntensity={0.6} roughness={0.3} metalness={0.2} />
      </mesh>
    </group>
  );
}

function Visibility({ el, children }) {
  const setFrameloop = useThree((s) => s.setFrameloop);
  useEffect(() => {
    const io = new IntersectionObserver(([e]) => setFrameloop(e.isIntersecting ? 'always' : 'never'), { threshold: 0 });
    io.observe(el);
    return () => io.disconnect();
  }, [el, setFrameloop]);
  return children;
}

export function HeroScene({ reduceMotion = false }) {
  const [el, setEl] = useState(null);
  const quality = useMemo(() => (typeof window !== 'undefined' && window.innerWidth < 900 ? 'low' : 'high'), []);
  return (
    <div ref={setEl} style={{ position: 'absolute', inset: 0 }}>
      {el && (
        <Canvas
          dpr={[1, quality === 'high' ? 1.5 : 1]}
          camera={{ position: [0, 0.4, 9], fov: 32, near: 0.1, far: 40 }}
          frameloop={reduceMotion ? 'demand' : 'always'}
          gl={{ antialias: true, alpha: true, powerPreference: 'high-performance' }}
          eventSource={document.body}
          eventPrefix="client"
          style={{ pointerEvents: 'none' }}
        >
          <ambientLight intensity={0.6} />
          <directionalLight position={[4, 6, 5]} intensity={1.4} />
          <Environment resolution={256}>
            <Lightformer intensity={2.5} position={[0, 5, -6]} scale={[12, 4, 1]} />
            <Lightformer intensity={1.2} position={[-6, 2, 3]} rotation={[0, Math.PI / 2, 0]} scale={[6, 3, 1]} />
            <Lightformer intensity={1.6} color="#ffd2b3" position={[6, -2, 2]} rotation={[0, -Math.PI / 2, 0]} scale={[6, 3, 1]} />
          </Environment>
          <Visibility el={el}>
            <Float speed={reduceMotion ? 0 : 1.2} rotationIntensity={0.15} floatIntensity={0.5}>
              <Stack reduceMotion={reduceMotion} quality={quality} />
            </Float>
          </Visibility>
        </Canvas>
      )}
    </div>
  );
}
