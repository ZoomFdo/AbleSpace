import React from 'react';

interface Props {
  children: React.ReactNode;
}

export default function HomeLayout({ children }: Props) {
  return (
    <div className="min-h-screen bg-gray-100">
      {children}
    </div>
  );
}